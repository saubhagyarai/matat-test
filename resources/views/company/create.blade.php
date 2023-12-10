<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Company') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form class="w-full"
                        action="{{ isset($company) ? route('companies.update', $company->id) : route('companies.store')}}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($company))
                        @method('PUT')
                        @endif
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-first-name">
                                    Name
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="grid-first-name" type="text" placeholder="Jane" name="name"
                                    value="{{isset($company) ? $company->name : old('name')}}">
                                @if ($errors->has('name'))
                                <p class="text-red-500 text-xs italic">
                                    {{$errors->first('name')}}
                                </p>
                                @endif
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-first-name">
                                    Email </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="grid-first-name" type="email" placeholder="Jane@gmail.com" name="email"
                                    value="{{isset($company) ? $company->email : old('email')}}">
                                @if ($errors->has('email'))
                                <p class="text-red-500 text-xs italic">
                                    {{$errors->first('email')}}
                                </p>
                                @endif
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-first-name">
                                    Logo </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    type="file" name="logo_img">
                                @if ($errors->has('logo_img'))
                                <p class="text-red-500 text-xs italic">
                                    {{$errors->first('logo_img')}}
                                </p>
                                @endif

                                @if (isset($company) &&$company->logo != 'placeholder.jpg')
                                <img src="{{$company->logoUrl()}}" alt="" height="100" width="100">
                                @endif
                            </div>
                        </div>

                        <!-- Using utilities: -->
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                            type="submit">
                            Save
                        </button>


                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>