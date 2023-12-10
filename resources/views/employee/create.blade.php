<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form class="w-full"
                        action="{{ isset($employee) ? route('employees.update', $employee->id) : route('employees.store')}}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($employee))
                        @method('PUT')
                        @endif
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-first-name">
                                    First Name
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="grid-first-name" type="text" placeholder="Jane" name="first_name"
                                    value="{{isset($employee) ? $employee->first_name : old('first_name')}}">
                                @if ($errors->has('first_name'))
                                <p class="text-red-500 text-xs italic">
                                    {{$errors->first('first_name')}}
                                </p>
                                @endif
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-first-name">
                                    Last Name
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="grid-first-name" type="text" placeholder="Doe" name="last_name"
                                    value="{{isset($employee) ? $employee->last_name : old('last_name')}}">
                                @if ($errors->has('last_name'))
                                <p class="text-red-500 text-xs italic">
                                    {{$errors->first('last_name')}}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="w-fullmb-6">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-state">
                                Company
                            </label>
                            <div class="relative">
                                <select
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-state" name="company_id">
                                    <option value="">Select Company</option>
                                    @foreach ($companies as $company)
                                    <option value="{{$company->id}}" @if(isset($employee) && !empty($employee->
                                        company_id))
                                        {{$company->id == $employee->company_id ? 'selected' : ''}}
                                        @else
                                        {{(old('company_id') == $company->id) ? 'selected':''}}
                                        @endif
                                        >
                                        {{$company->name}}
                                    </option>
                                    @endforeach
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                            </div>
                            @if ($errors->has('company_id'))
                            <p class="text-red-500 text-xs italic">
                                {{$errors->first('company_id')}}
                            </p>
                            @endif
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-first-name">
                                    Email </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="grid-first-name" type="email" placeholder="Jane@gmail.com" name="email"
                                    value="{{isset($employee) ? $employee->email : old('email')}}">
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
                                    Phone </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="grid-first-name" type="phone" placeholder="9888888888" name="phone"
                                    value="{{isset($employee) ? $employee->phone : old('phone')}}">
                                @if ($errors->has('phone'))
                                <p class="text-red-500 text-xs italic">
                                    {{$errors->first('phone')}}
                                </p>
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