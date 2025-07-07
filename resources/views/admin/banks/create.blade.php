@extends('layouts.master')

@section('title')
    @lang('translation.Dashboards')
@endsection

@section('content')
    @component('components.breadcrumb')
    @slot('li_1')
    @lang('site.home')
    @endslot
    @slot('title')
    @lang('banks.banks')
    @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <a href="{{ route('ad.banks.index') }}" class="btn btn-soft-primary">
                                @lang('Back')
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('ad.banks.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('banks.title')<span class="text-danger">*</span></label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title') }}"
                                        placeholder="@lang('banks.title')">
                                    @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('banks.minimum_payment')<span class="text-danger">*</span></label>
                                    <input type="number" name="minimum_payment" class="form-control"
                                        value="{{ old('minimum_payment') }}" placeholder="@lang('banks.minimum_payment')"
                                        step=".01" min="0">
                                    @error('minimum_payment')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('banks.limit_payment')<span class="text-danger">*</span></label>
                                    <input type="number" name="limit_payment" class="form-control"
                                        value="{{ old('limit_payment') }}" placeholder="@lang('banks.limit_payment')"
                                        step="0.01" min="0">
                                    @error('limit_payment')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('banks.image')</label>
                                    <input type="file" name="image" class="form-control">
                                    @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                @isset($bank->image)
                                    <img src="{{ asset('uploads/banks/' . $bank->image) }}" alt="bank image" width="100">
                                @endisset
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('banks.fee_percentage')<span class="text-danger">*</span></label>
                                    <input type="number" name="fee_percentage" class="form-control"
                                        value="{{ old('fee_percentage') }}" placeholder="@lang('banks.fee_percentage')"
                                        step="0.01" min="0">
                                    @error('fee_percentage')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('banks.address')<span class="text-danger">*</span></label>
                                    <input type="text" name="address" class="form-control" value="{{ old('address') }}"
                                        placeholder="@lang('banks.address')">
                                    @error('address')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('banks.is_active')<span class="text-danger">*</span></label>
                                    <select name="is_active" class="form-control">
                                        <option value="1" {{ old('is_active') == 1 ? 'selected' : null }}>{{ __('Active') }}
                                        </option>
                                        <option value="0" {{ old('is_active') == 0 ? 'selected' : null }}>{{ __('Inactive') }}
                                        </option>
                                    </select>
                                    @error('is_active')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-5">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('Add')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection