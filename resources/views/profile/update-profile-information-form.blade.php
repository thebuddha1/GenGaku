<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model.live="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Name') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" required autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model="state.email" required autocomplete="username" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2 dark:text-white">
                    {{ __('Your email address is unverified.') }}

                    <button type="button" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>
        <!-- Experience -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="experience" value="{{ __('Experience') }}" />
            <p>{{ auth()->user()->profileStatistic->experience }}</p>
        </div>

        <!-- Sterak -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="streak" value="{{ __('Streak') }}" />
            <p>{{ auth()->user()->profileStatistic->streak }}</p>
        </div>
        <!-- Highest Rank -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="highest_rank" value="{{ __('Highest rank') }}" />
            <p>{{ auth()->user()->profileStatistic->highest_rank }}</p>
        </div>

        <!-- Chapter -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="cur_chpt" value="{{ __('Current chapter') }}" />
            <p>{{ auth()->user()->profileProgression->cur_chpt }}</p>
        </div>

        <!-- Lesson -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="cur_lsn" value="{{ __('Current lesson') }}" />
            <p>{{ auth()->user()->profileProgression->cur_lsn }}</p>
        </div>

        <!-- Hiragana Chapter -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="cur_hrgn" value="{{ __('Current chapter (hiragana)') }}" />
            <p>{{ auth()->user()->profileProgression->cur_hrgn }}</p>
        </div>
        
        <!-- Katakana Chapter -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="cur_ktkn" value="{{ __('Current chapter (katakana)') }}" />
            <p>{{ auth()->user()->profileProgression->cur_ktkn }}</p>
        </div>
        
        <!-- Finished test -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="fnshd_tsts" value="{{ __('Finished tests') }}" />
            <p>{{ auth()->user()->profileProgression->fnshd_tsts }}</p>
        </div>



    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
