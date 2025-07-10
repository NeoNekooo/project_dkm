    <?php
    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\Img;
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Str;
    use Carbon\Carbon;

    class ImgController extends Controller
    {
        const ITEMS_PER_PAGE = 8;
        const MAX_IMAGE_SIZE = 2048; // 2MB in KB
        const IMAGE_STORAGE_PATH = 'gallery';

        public function index()
        {
            $imgs = Img::latest()->paginate(self::ITEMS_PER_PAGE);
            $tags = Img::distinct()->orderBy('tag')->pluck('tag');
            return view('pages.admin.gallery.index', compact('imgs', 'tags'));
        }

        public function create()
        {
            $tags = Img::distinct()->orderBy('tag')->pluck('tag');
            return view('pages.admin.gallery.create', compact('tags'));
        }

        public function store(Request $request)
        {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'tanggal' => 'required|date',
                'tag' => 'required|string|max:100',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:'.self::MAX_IMAGE_SIZE,
            ]);

            try {
                $filename = Str::random(20).'_'.time().'.'.$request->file('image')->extension();
                $path = $request->file('image')->store('public/' . self::IMAGE_STORAGE_PATH);
                $publicPath = str_replace('public/', 'storage/', $path);

                Img::create([
                    'name' => $validated['name'],
                    'tanggal' => $validated['tanggal'],
                    'tag' => $validated['tag'],
                    'path' =>$publicPath
                ]);

                return redirect()
                    ->route('admin.gallery.index')
                    ->with('success', 'Gambar berhasil ditambahkan.');

            } catch (\Exception $e) {
                return back()
                    ->withInput()
                    ->with('error', 'Gagal mengunggah gambar: '.$e->getMessage());
            }
        }

        public function edit(Img $img)
        {
            $tags = Img::distinct()->orderBy('tag')->pluck('tag');
            return view('pages.admin.gallery.edit', compact('img', 'tags'));
        }

        public function update(Request $request, Img $img)
        {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'tanggal' => 'required|date',
                'tag' => 'required|string|max:100',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:'.self::MAX_IMAGE_SIZE,
            ]);

            try {
                $updateData = [
                    'name' => $validated['name'],
                    'tanggal' => $validated['tanggal'],
                    'tag' => $validated['tag']
                ];

                if ($request->hasFile('image')) {
                    Storage::disk('public')->delete($img->path);
                    $filename = Str::random(20).'_'.time().'.'.$request->file('image')->extension();
                    $updateData['path'] = $request->file('image')->storeAs(self::IMAGE_STORAGE_PATH, $filename, 'public');
                }

                $img->update($updateData);

                return redirect()
                    ->route('admin.gallery.index')
                    ->with('success', 'Gambar berhasil diperbarui.');

            } catch (\Exception $e) {
                return back()
                    ->withInput()
                    ->with('error', 'Gagal memperbarui gambar: '.$e->getMessage());
            }
        }

        public function destroy(Img $img)
        {
            try {
                Storage::disk('public')->delete($img->path);
                $img->delete();
                return back()->with('success', 'Gambar berhasil dihapus.');
            } catch (\Exception $e) {
                return back()->with('error', 'Gagal menghapus gambar: '.$e->getMessage());
            }
        }

        public function showTimeline()
        {
            $imgs = Img::orderBy('tanggal')->get();

            return view('pages.public.timeline', [
                'imgs' => $imgs,
                'groupedImgs' => $imgs->groupBy(function($item) {
                    return Carbon::parse($item->tanggal)->format('F Y'); // Group by Month Year
                })
            ]);
        }

        public function showGallery()
        {
            $imgs = Img::latest()->paginate(self::ITEMS_PER_PAGE);
            $tags = Img::distinct()->orderBy('tag')->pluck('tag');

            $formattedImgs = $imgs->getCollection()->map(function ($img) {
                return [
                    'id' => $img->id,
                    'name' => $img->name,
                    'tanggal' => Carbon::parse($img->tanggal)->translatedFormat('d F Y'),
                    'tag' => $img->tag,
                    'path' => asset('storage/'.$img->path),
                    'uploaded_at' => $img->created_at->diffForHumans()
                ];
            });

            $imgs->setCollection(collect($formattedImgs)); // ✅ Ini bagian penting

            return view('pages.gallery.index', compact('imgs', 'formattedImgs', 'tags'));
        }

    }
