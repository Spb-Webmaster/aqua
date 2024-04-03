@extends('layouts.layout')
@section('content')
    <main>
        <div class="cabinet  block">
            <div class="pageLogin">
                <div class="pageLogin__left"></div>
                <div class="pageLogin__right">
                    <div class="formLogin">

                        <x-forms.auth-form
                            title="{{__('Add Event')}}"
                            action="{{ route('addEvent.handle') }}"
                            enctype="{{__('multipart/form-data')}}"
                            method="POST"
                        >
                            <div class="x-forms">
                                <div class="x-forms__left">
                                    <div class="text_input">
                                        <x-forms.text-input
                                            id="EventText"
                                            type="text"
                                            name="title"
                                            placeholder="Title"
                                            required="true"
                                            value="{{ old('title') }}"
                                            :isError="$errors->has('title')"
                                        />
                                        @error('title')
                                        <x-forms.error>
                                            {{ $message }}
                                        </x-forms.error>
                                        @enderror
                                    </div>
                                    <div class="text_input">

                                        <label class="input-file">
                                            <input type="file" name="file" class="custom-file-input" id="chooseFile">
                                            <span class="input-file-btn">Upload File</span>
                                            <span class="input-file-text">Max 10Mb</span>
                                        </label>


                                    </div>
                                </div>
                                <div class="x-forms__right">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div id="inputFormRow">
                                                <div class="input-group mb-3 text_input">


                                                    <x-forms.text-input
                                                        id="EventJudge"
                                                        type="text"
                                                        name="judge[]"
                                                        placeholder="Judge"
                                                        required="true"
                                                        value=""
                                                        autocomplete="off"
                                                        optional="form-control m-input"

                                                    />
                                                    @error('judge')
                                                    <x-forms.error>
                                                        {{ $message }}
                                                    </x-forms.error>
                                                    @enderror


                                                    <div class="input-group-append">
                                                        <button id="removeRow" type="button" class="btn btn-danger button_red">
                                                            Remove
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="newRow"></div>
                                            <button id="addRow" type="button" class="btn btn-info button button_strongblue">Add Judge</button>
                                        </div>
                                    </div>


                                </div>

                            </div>
                            <x-slot:buttons>
                                    <div class="pageLogin__slotButtons slotButtons">
                                        <div class="slotButtons__flex">

                                            <div class="slotButtons__right">
                                                <x-forms.primary-button>
                                                    {{ __('Send') }}
                                                </x-forms.primary-button>
                                            </div>
                                        </div>

                                    </div>
                                </x-slot:buttons>
                        </x-forms.auth-form>

                    </div><!--.formLogin-->

                </div>

            </div>
        </div>

    </main>
@endsection




