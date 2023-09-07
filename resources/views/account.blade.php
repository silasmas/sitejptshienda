@extends('layouts.guest')

@section('guest-content')

            <!-- ======= About Section ======= -->
            <section id="about" class="about">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-sm-5 col-9 mx-sm-0 mx-auto">
                            <!-- #Avatar ==================== -->
                            <div class="card border mb-4">
                                <div class="card-body pt-2 pb-0">
                                    <p class="small card-text text-center"><small>@lang('miscellaneous.click_image') <i class="bi bi-arrow-down"></i></small></p>
                                </div>
                                <div id="userImageWrapper" class="card-body pt-2">
                                    <div class="bg-image hover-overlay ripple shadow-1-strong rounded-5" data-mdb-ripple-color="light">
                                        <img src="{{ $current_user->avatar_url != null ? $current_user->avatar_url : asset('assets/img/user.png') }}" alt="{{ $current_user->firstname . ' ' . $current_user->lastname }}" class="user-image img-fluid img-thumbnail rounded-5">
                                        <form method="POST">
                                            <div class="mask text-light d-flex justify-content-center flex-column text-center" style="background-color: rgba(0, 0, 0, 0.5)">
                                                <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                                                <label role="button" for="avatar" class="d-flex h-100 justify-content-center align-items-center" title="@lang('miscellaneous.change_image')">
                                                    <span class="bi bi-pencil fs-1"></span>
                                                    <input type="file" name="avatar" id="avatar" class="d-none">
                                                </label>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-8 col-sm-7 col-12">
                            <!-- #Personal Infos ==================== -->
                            <div class="card border mb-4">
                                <div class="card-header pb-1 d-flex justify-content-between">
                                    <h5 class="h5 m-0">@lang('miscellaneous.account.personal_infos.title')</h5>

                                    <span class="dropdown m-0">
                                        <a href="#" data-bs-toggle="dropdown">
                                            <i class="bi bi-translate me-2 align-middle fs-5"></i><span class="d-lg-inline d-none">@lang('miscellaneous.your_language')</span>
                                        </a>
                                        <div class="dropdown-menu overflow-hidden">
    @foreach ($available_locales as $locale_name => $available_locale)
        @if ($available_locale != $current_locale)
                                            <a class="dropdown-item" href="{{ route('change_language', ['locale' => $available_locale]) }}">
            @switch($available_locale)
                @case('ln')
                                                <span class="fi fi-cd me-3"></span>
                @break
                @case('en')
                                                <span class="fi fi-us me-3"></span>
                @break
                @default
                                                <span class="fi fi-{{ $available_locale }} me-3"></span>
                @endswitch
                                                {{ $locale_name }}
                                            </a>
        @endif
    @endforeach
                                        </div>
                                    </span>
                                </div>

                                <div class="card-body">
                                    <form method="POST" action="{{ route('account') }}">
    @csrf
                                        <div class="row">
                                            <!-- First name -->
                                            <div class="mb-3 col-lg-4">
                                                <label for="register_firstname" class="form-label mb-1">@lang('miscellaneous.firstname')</label>
                                                <input type="text" name="register_firstname" id="register_firstname" class="form-control" placeholder="@lang('miscellaneous.firstname')" value="{{ $current_user->firstname }}">
    @if (!empty($response_error) AND $response_error->message == $inputs['firstname'])
                                                <small id="firstnameHelp" class="text-danger">{{ $response_error->data }}</small>
    @endif
                                            </div>

                                            <!-- Last name -->
                                            <div class="mb-3 col-lg-4">
                                                <label for="register_lastname" class="form-label mb-1">@lang('miscellaneous.lastname')</label>
                                                <input type="text" name="register_lastname" id="register_lastname" class="form-control" placeholder="@lang('miscellaneous.lastname')" value="{{ $current_user->lastname }}">
                                            </div>

                                            <!-- Surname -->
                                            <div class="mb-3 col-lg-4">
                                                <label for="register_surname" class="form-label mb-1">@lang('miscellaneous.surname')</label>
                                                <input type="text" name="register_surname" id="register_surname" class="form-control" placeholder="@lang('miscellaneous.surname')" value="{{ $current_user->surname }}">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Gender -->
                                            <div class="mb-3 col-lg-4">
                                                <div class="mb-1" for="select_gender">@lang('miscellaneous.gender_title')</div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-label form-check-label align-middle">
                                                        <input type="radio" name="register_gender" id="gender1" class="form-check-input" value="M" {{ $current_user->gender == 'M' ? 'checked' : '' }}>
                                                        @lang('miscellaneous.gender1')
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-label form-check-label align-middle">
                                                        <input type="radio" name="register_gender" id="gender2" class="form-check-input" value="F" {{ $current_user->gender == 'F' ? 'checked' : '' }}>
                                                        @lang('miscellaneous.gender2')
                                                    </label>
                                                </div>
                                            </div>
                
                                            <!-- Nationality -->
                                            <div class="mb-3 col-lg-4">
                                                <label for="register_nationality" class="form-label mb-1">@lang('miscellaneous.nationality')</label>
                                                <input type="text" name="register_nationality" id="register_nationality" class="form-control" placeholder="@lang('miscellaneous.nationality')" value="{{ $current_user->nationality }}">
                                            </div>
                
                                            <!-- Birth city -->
                                            <div class="mb-3 col-lg-4">
                                                <label for="register_birth_city" class="form-label mb-1">@lang('miscellaneous.birth_city')</label>
                                                <input type="text" name="register_birth_city" id="register_birth_city" class="form-control" placeholder="@lang('miscellaneous.birth_city')" value="{{ $current_user->birth_city }}">
                                            </div>
                                        </div>
                
                                        <div class="row">
                                            <!-- Birth date -->
                                            <div class="mb-3 col-lg-4">
                                                <label for="register_birthdate" class="form-label mb-1">@lang('miscellaneous.birth_date.label')</label>
                                                <div class="timepicker-input input-icon">
                                                    <div class="input-group">
                                                        <div class="input-group-text bgc-grey-300 bd bdwR-0">
                                                            <i class="bi bi-calendar"></i>
                                                        </div>
                                                        <input type="text" name="register_birthdate" id="register_birthdate" class="form-control" placeholder="@lang('miscellaneous.birth_date.label')" value="{{ (!empty($current_user->birth_date) ? (str_starts_with(app()->getLocale(), 'fr') ? \Carbon\Carbon::createFromFormat('Y-m-d', $current_user->birth_date)->format('d/m/Y') : \Carbon\Carbon::createFromFormat('Y-m-d', $current_user->birth_date)->format('m/d/Y')) : null) }}">
                                                    </div>
                                                </div>
                                            </div>
                
                                            <!-- E-mail -->
                                            <div class="mb-3 col-lg-4">
                                                <label for="register_email" class="form-label mb-1">@lang('miscellaneous.email')</label>
                                                <input type="text" name="register_email" id="register_email" class="form-control" placeholder="@lang('miscellaneous.email')" value="{{ $current_user->email }}">
    @if (!empty($response_error) AND $response_error->message == $inputs['email'])
                                                <small id="emailHelp" class="text-danger">{{ $response_error->data }}</small>
    @endif
                                            </div>

                                            <!-- Phone -->
                                            <div class="mb-3 col-lg-4">
                                                <label for="register_phone" class="form-label mb-1">@lang('miscellaneous.phone')</label>
                                                <input type="text" name="register_phone" id="register_phone" class="form-control" placeholder="@lang('miscellaneous.phone')" value="{{ $current_user->phone }}">
    @if (!empty($response_error) AND $response_error->message == $inputs['phone'])
                                                <small id="phoneHelp" class="text-danger">{{ $response_error->data }}</small>
    @endif
                                            </div>
                                        </div>

                                        <!-- Adresses -->
                                        <div class="row">
                                            <!-- Legal address -->
                                            <div class="col-12">
                                                <div class="card mb-4 border border-default rounded-0 shadow-0">
                                                    <div class="card-body pb-0">
                                                        <h6 class="h6 text-black fw-bold text-uppercase">
                                                            @lang('miscellaneous.address.legal')</h6>
                                                    </div>
                                                    <div class="card-body pt-0">
                                                        <div class="row">
                                                            <div class="mb-3 col-lg-6">
                                                                <label for="register_legal_address_country" class="form-label mb-1">@lang('miscellaneous.admin.country.title')</label>
                                                                <select name="register_legal_address_country" id="register_legal_address_country" class="form-control">
                                                                    <option class="small" {{ $legal_address !=null ? '' : 'selected ' }}disabled>@lang('miscellaneous.choose_country')</option>
    @foreach ($countries as $country)
                                                                    <option value="{{ $country->id }}" {{ $legal_address !=null ? ($legal_address->country->id == $country->id ? ' selected' : '') : '' }}>{{ $country->country_name }}</option>
    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="mb-3 col-lg-6">
                                                                <label for="register_legal_address_city" class="form-label mb-1">@lang('miscellaneous.address.city')</label>
                                                                <input type="text" name="register_legal_address_city" id="register_legal_address_city" class="form-control" placeholder="@lang('miscellaneous.address.city')" value="{{ $legal_address != null ? $legal_address->city : '' }}">
                                                            </div>
                                                        </div>
                
                                                        <div class="row">
                                                            <div class="mb-3 col-lg-6">
                                                                <label for="register_legal_address_area" class="form-label mb-1">@lang('miscellaneous.address.area')</label>
                                                                <input type="text" name="register_legal_address_area" id="register_legal_address_area" class="form-control" placeholder="@lang('miscellaneous.address.area')" value="{{ $legal_address != null ? $legal_address->area : '' }}">
                                                            </div>
                
                                                            <div class="mb-3 col-lg-6">
                                                                <label for="register_legal_address_neighborhood" class="form-label mb-1">@lang('miscellaneous.address.neighborhood')</label>
                                                                <input type="text" name="register_legal_address_neighborhood" id="register_legal_address_neighborhood" class="form-control" placeholder="@lang('miscellaneous.address.neighborhood')" value="{{ $legal_address != null ? $legal_address->neighborhood : '' }}">
                                                            </div>
                                                        </div>
                
                                                        <div class="row">
                                                            <div class="mb-3 col-lg-6">
                                                                <label for="register_legal_address_address_content_1" class="form-label mb-1">@lang('miscellaneous.address.line1')</label>
                                                                <textarea name="register_legal_address_address_content_1" id="register_legal_address_address_content_1" class="form-control" placeholder="@lang('miscellaneous.address.placeholder')">{{ $legal_address != null ? $legal_address->address_content : '' }}</textarea>
                                                            </div>
                
                                                            <div class="mb-3 col-lg-6">
                                                                <label for="register_legal_address_address_content_2" class="form-label mb-1">@lang('miscellaneous.address.line2')</label>
                                                                <textarea name="register_legal_address_address_content_2" id="register_legal_address_address_content_2" class="form-control" placeholder="@lang('miscellaneous.address.placeholder')">{{ $legal_address != null ? $legal_address->address_content_2 : '' }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                
                                            <!-- Residence -->
                                            <div class="col-12">
                                                <div class="card mb-4 border border-default rounded-0 shadow-0">
                                                    <div class="card-body pb-0">
                                                        <h6 class="h6 text-black fw-bold text-uppercase">@lang('miscellaneous.address.residence')</h6>
                                                    </div>
                                                    <div class="card-body pt-0">
                                                        <div class="row">
                                                            <div class="mb-3 col-lg-6">
                                                                <label for="register_residence_country" class="form-label mb-1">@lang('miscellaneous.admin.country.title')</label>
                                                                <select name="register_residence_country" id="register_residence_country" class="form-control">
                                                                    <option class="small" {{ $residence !=null ? '' : 'selected ' }}disabled>@lang('miscellaneous.choose_country')</option>
    @foreach ($countries as $country)
                                                                    <option value="{{ $country->id }}" {{ $residence !=null ? ($residence->country->id == $country->id ? ' selected' : '') : '' }}>{{ $country->country_name }}</option>
    @endforeach
                                                                </select>
                                                            </div>
                
                                                            <div class="mb-3 col-lg-6">
                                                                <label for="register_residence_city" class="form-label mb-1">@lang('miscellaneous.address.city')</label>
                                                                <input type="text" name="register_residence_city" id="register_residence_city" class="form-control" placeholder="@lang('miscellaneous.address.city')" value="{{ $residence != null ? $residence->city : '' }}">
                                                            </div>
                                                        </div>
                
                                                        <div class="row">
                                                            <div class="mb-3 col-lg-6">
                                                                <label for="register_residence_area" class="form-label mb-1">@lang('miscellaneous.address.area')</label>
                                                                <input type="text" name="register_residence_area" id="register_residence_area" class="form-control" placeholder="@lang('miscellaneous.address.area')" value="{{ $residence != null ? $residence->area : '' }}">
                                                            </div>
                
                                                            <div class="mb-3 col-lg-6">
                                                                <label for="register_residence_neighborhood" class="form-label mb-1">@lang('miscellaneous.address.neighborhood')</label>
                                                                <input type="text" name="register_residence_neighborhood" id="register_residence_neighborhood" class="form-control" placeholder="@lang('miscellaneous.address.neighborhood')" value="{{ $residence != null ? $residence->neighborhood : '' }}">
                                                            </div>
                                                        </div>
                
                                                        <div class="row">
                                                            <div class="mb-3 col-lg-6">
                                                                <label for="register_residence_address_content_1" class="form-label mb-1">@lang('miscellaneous.address.line1')</label>
                                                                <textarea name="register_residence_address_content_1" id="register_residence_address_content_1" class="form-control" placeholder="@lang('miscellaneous.address.placeholder')">{{ $residence != null ? $residence->address_content : '' }}</textarea>
                                                            </div>
                
                                                            <div class="mb-3 col-lg-6">
                                                                <label for="register_residence_address_content_2" class="form-label mb-1">@lang('miscellaneous.address.line2')</label>
                                                                <textarea name="register_residence_address_content_2" id="register_residence_address_content_2" class="form-control" placeholder="@lang('miscellaneous.address.placeholder')">{{ $residence != null ? $residence->address_content_2 : '' }}</textarea>
                                                            </div>
                                                            <!-- P.O. box -->
                                                            <div class="mb-3 col-lg-6">
                                                                <label for="register_p_o_box" class="form-label mb-1">@lang('miscellaneous.p_o_box')</label>
                                                                <input type="text" name="register_p_o_box" id="register_p_o_box" class="form-control" placeholder="@lang('miscellaneous.p_o_box')" value="{{ $current_user->p_o_box }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <label for="register_password" class="form-label mb-1">@lang('miscellaneous.password.label')</label>
                                                <input type="password" name="register_password" id="register_password" class="form-control" placeholder="@lang('miscellaneous.password.label')">
                                            </div>

                                            <div class="col-md-6 mb-4">
                                                <label for="confirm_password" class="form-label mb-1">@lang('miscellaneous.confirm_password.label')</label>
                                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="@lang('miscellaneous.confirm_password.label')">
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-block btn-primary btn-color rounded-pill shadow-0">@lang('miscellaneous.register_update')</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- End About Section -->

@endsection
