@extends('layouts.admin', ['subtitle' => "Products", 'title' => "Category List"])

@section('content')

<div class="grid grid-cols-1">
    <div class="border rounded-lg border-default-200">
        <div class="px-6 py-4 overflow-hidden ">
            <div class="flex flex-wrap md:flex-nowrap items-center justify-between gap-4">
                <h2 class="text-xl text-default-800 font-semibold">Categories</h2>

                <div class="flex flex-wrap items-center gap-4">
                    <a href="{{ route('second', ['products', 'categorysetup']) }}" class="py-2.5 px-4 inline-flex rounded-lg text-sm font-medium bg-primary text-white transition-all hover:bg-primary-500">Add Category</a>
                </div>
            </div>
        </div>

        <div class="relative overflow-x-auto">
            <div class="min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-default-200">
                        <thead class="bg-default-100">
                            <tr class="text-start">
                                <th class="px-6 py-3 text-start text-sm whitespace-nowrap font-medium text-default-800">Image</th>
                                <th class="px-6 py-3 text-start text-sm whitespace-nowrap font-medium text-default-800">Category</th>
                                <th class="px-6 py-3 text-start text-sm whitespace-nowrap font-medium text-default-800">Items</th>
                                <th class="px-6 py-3 text-start text-sm whitespace-nowrap font-medium text-default-800">Discount</th>
                                <th class="px-6 py-3 text-start text-sm whitespace-nowrap font-medium text-default-800">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-default-200">
                            @foreach (AllCategory() as $row)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="w-12 h-12 rounded-lg overflow-hidden bg-default-100 flex items-center justify-center">
                                        @if($row->image && file_exists(public_path($row->image)))
                                            <img src="{{ asset($row->image) }}" alt="{{ $row->name }}" class="w-full h-full object-cover">
                                        @else
                                            <i data-lucide="image" class="w-6 h-6 text-default-400"></i>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">
                                    <div class="flex items-center gap-3">
                                        <p class="text-base text-default-500 transition-all hover:text-primary">{{ $row->name }}</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">{{ method_exists($row,'items') ? $row->items()->count() : 0 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">{{ $row->discount ?? 0 }}%</td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-3">
                                        <a href="{{ route('category.edit', $row->id) }}" class="transition-all hover:text-primary"><i data-lucide="pencil" class="w-5 h-5"></i></a>
                                        <a href="javascript:void(0)" data-id="{{ $row->id }}" class="js-cat-delete transition-all hover:text-red-500"><i data-lucide="trash-2" class="w-5 h-5"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
document.addEventListener('click', function(e){
  const btn = e.target.closest('.js-cat-delete');
  if(!btn) return;
  const id = btn.getAttribute('data-id');
  if(!id) return;
  if(!confirm('Delete this category?')) return;

  fetch(`{{ url('/category') }}/${id}`, {
    method: 'DELETE',
    headers: {
      'X-CSRF-TOKEN': `{{ csrf_token() }}`,
      'Accept': 'application/json'
    }
  }).then(r => r.json()).then(() => location.reload());
});
</script>
@endsection


