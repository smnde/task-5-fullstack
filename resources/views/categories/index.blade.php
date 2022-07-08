@extends('layouts.app')
@section('content')
	<div class="flex justify-between gap-6 h-[425px] overflow-hidden">
		<div class="w-6/12">
			<div class="p-4 bg-sky-600 rounded-t-lg shadow-lg">
				Add category
			</div>
			<div class="h-52 py-4 px-6 bg-white rounded-b-lg shadow-lg">
				<form action="{{ route('categories.store') }}" method="post">
					@csrf
					<div class="mb-10">
						<label class="block text-gray-700 text-sm font-bold mb-2" for="email">
							Category name
						</label>
						<input class="shadow appearance-none border focus:border-blue-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" name="name" placeholder="Category name">
					</div>
					<button class="py-2 px-5 bg-blue-500 rounded-lg shadow-lg float-right text-slate-800 hover:bg-blue-700 hover:text-white">Submit</button>
				</form>
			</div>
		</div>

		<div class="w-full overflow-x-hidden overflow-y-auto h-[400px] bg-white relative rounded-lg">
			<div class="inline-block w-full align-middle">
				<table class="w-full divide-gray-200 table-auto">
					<thead class="bg-sky-600 sticky top-0">
						<tr>
							<th scope="col" class="p-4">#</th>
							<th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
								Category Name
							</th>
							<th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
								Author
							</th>
							<th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
								Actions
							</th>
						</tr>
					</thead>
					<tbody class="bg-white divide-y divide-gray-200 border-b-2">
						@foreach ($categories as $category)
							<tr class="hover:bg-gray-100">
								<td class="p-4 w-4">
									{{ $loop->iteration }}
								</td>
								<td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
									{{ $category->name }}
								</td>
								<td class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap">
									{{ $category->author->name }}
								</td>
								<td class="py-4 px-6 text-sm font-medium text-right">
									<form class="flex gap-4" action="{{ route('categories.destroy', $category->id) }}" method="post">
										@csrf
										@method('DELETE')
										<a href="{{ route('categories.edit', $category->id) }}" class="py-1 px-5 bg-green-500 hover:bg-green-700 text-white rounded-lg">Edit</a>
										<button type="submit" class="py-1 px-5 bg-red-500 hover:bg-red-700 text-white rounded-lg">Delete</button>
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>	
			</div>	
		</div>
	</div>
@endsection