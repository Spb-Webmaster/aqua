@extends('layouts.layout')
@section('content')
    <main>
        @if($role)

            <div class="auth  block">
                <div class="pageLogin">
                    <div class="pageLogin__left"></div>
                    <div class="pageLogin__right">
                        <div class="formLogin">

                            <x-forms.auth-form
                                title="{{__('Exit from the site')}}"
                                action="{{ route('logout') }}"
                                method="POST"
                            >

                                <div class="text_input">
                                    <div class="text_input__text">
                                        {{ $role }}
                                    </div>
                                </div>
                                <div class="text_input">
                                    <div class="text_input__text">
                                        {{ auth()->user()->email }}
                                    </div>
                                </div>


                                <x-slot:buttons>
                                    <div class="pageLogin__slotButtons slotButtons">
                                        <div class="slotButtons__flex">

                                            <div class="slotButtons__right">
                                                <x-forms.primary-button>
                                                    {{ __('Exit') }}
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
        @else

            <div class="auth  block">
                <div class="pageLogin">
                    <div class="pageLogin__left"></div>
                    <div class="pageLogin__right">
                        <div class="formLogin">

                            <x-forms.auth-form
                                title="{{__('Login')}}"
                                action="{{ route('login.handle') }}"
                                method="POST"
                            >

                                <div class="text_input">
                                    <x-forms.text-input
                                        id="loginEmail"
                                        type="email"
                                        name="email"
                                        placeholder="E-mail"
                                        required="true"
                                        value="{{ old('email') }}"
                                        :isError="$errors->has('email')"
                                    />
                                    @error('email')
                                    <x-forms.error>
                                        {{ $message }}
                                    </x-forms.error>
                                    @enderror
                                </div>
                                <div class="text_input">
                                    <x-forms.text-input
                                        id="loginPassword"
                                        type="password"
                                        name="password"
                                        placeholder="Password"
                                        required="true"
                                        :isError="$errors->has('email')"
                                    />
                                </div>


                                <x-slot:buttons>
                                    <div class="pageLogin__slotButtons slotButtons">
                                        <div class="slotButtons__flex">

                                            <div class="slotButtons__right">
                                                <x-forms.primary-button>
                                                    {{ __('Enter') }}
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

        @endif
    </main>

@endsection




