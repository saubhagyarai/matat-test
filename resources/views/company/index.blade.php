<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Using utilities: -->
            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                href="{{route('companies.create')}}">
                Add
            </a>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="w-full text-left text-sm font-light">
                                    <thead class="border-b font-medium dark:border-neutral-500">
                                        <tr>
                                            <th scope="col" class="px-6 py-4" style="text-align: left">#</th>
                                            <th scope="col" class="px-6 py-4" style="text-align: left">Name</th>
                                            <th scope="col" class="px-6 py-4" style="text-align: left">Email</th>
                                            <th scope="col" class="px-6 py-4" style="text-align: left">Logo</th>
                                            <th scope="col" class="px-6 py-4" style="text-align: left">Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($companies as $company)

                                        <tr class="border-b dark:border-neutral-500">
                                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{$loop->iteration}}
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4">{{$company->name}}</td>
                                            <td class="whitespace-nowrap px-6 py-4">{{$company->email ?? 'N/A'}}</td>
                                            <td class="whitespace-nowrap px-6 py-4">
                                                <img src="{{$company->logoUrl() }}" alt="" height="60" width="60">
                                            </td>

                                            <td class="whitespace-nowrap px-6 py-4">
                                                <a href="{{route('companies.edit', $company->id)}}"
                                                    class="bg-transparent hover:bg-transparent text-blue-500 font-semibold hover:underline py-2 px-4 border border-blue-500 rounded">
                                                    Edit
                                                </a>

                                                <form action="{{route('companies.destroy', $company->id)}}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="bg-transparent hover:bg-transparent text-red-500 font-semibold hover:underline py-2 px-4 border border-red-500 rounded">
                                                        Delete </button>
                                                </form>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                {{$companies->links()}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>