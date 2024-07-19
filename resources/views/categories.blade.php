<x-app-layout>
    <div class="py-7 space-y-7">

        @foreach($errors as $error)
            <div>
                <p>{{$error}}</p>
            </div>
        @endforeach

        <div class="max-w-fit sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
                <!--
                <p class="text-center text-gray-900 dark:text-gray-100 text-xm p-3">
                    <span class="mr-1 text-xl">+</span>
                </p>
                -->
                <x-primary-button
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'category-creation')"
                >+ {{ __('Create Categories') }}</x-primary-button>
            </div>
        </div>

        <x-modal name="category-creation" focusable>
            <form method="post" action="{{ route('category.create') }}" class="p-5">
                @csrf
                @method('post')

                <h3 class="text-lg font-semibold text-white text-center">Category Creation</h3>

                <div class="space-y-3">
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="description" :value="__('Description')" />
                        <x-textarea-input id="description" class="block mt-1 w-full min-h-36" type="text" name="description" :value="old('description')" required autofocus autocomplete="description">
                        </x-textarea-input>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <x-primary-button class="mt-3">Create</x-primary-button>

                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="p-6 text-gray-900 dark:text-gray-100">
                                        {{ $error }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </form>
        </x-modal>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($categories as $category)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg my-2">
                    <div class="p-6 text-gray-900 dark:text-gray-100 space-y-2">
                        <p><bold class="font-semibold">Name:</bold> {{ $category->name }}</p>
                        <p><bold class="font-semibold">Description:</bold> {{ $category->description }}</p>
                        <form class="max-w-fit" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <x-secondary-button type="submit">Update</x-secondary-button>
                        </form>
                        <form class="max-w-fit" method="POST" action="/categories/{{$category->id}}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <x-danger-button type="submit">Delete</x-danger-button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <!--
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're on the categories page") }}
                </div>
            </div>
        </div>
        -->
    </div>

</x-app-layout>
