<section class="space-y-6">
    <x-primary-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'add-new-profile-frm')"
    >{{ __('Add New Profiles') }}</x-primary-button>

    <x-modal name="add-new-profile-frm" :show="$errors->usernamesDataUpload->isNotEmpty()" focusable>
        <form method="post" action="{{ route('UsernamesData.upload') }}" class="p-6" enctype="multipart/form-data">
            @csrf

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Please select a file from your computer (.txt)') }}
            </h2>

            <div class="mt-6">
                <x-input-label for="listUsernamesData" value="{{ __('Upload file') }}" />

                <x-file-input
                    id="listUsernamesData"
                    name="listUsernamesData"
                    type="file"
                    class="mt-1"
                    accept=".txt"
                />

                <x-input-error :messages="$errors->usernamesDataUpload->get('listUsernamesData')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ml-3">
                    {{ __('Add New Profiles') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>
</section>
