@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.contact.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.contacts.update", [$contact->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="category_id">{{ trans('cruds.contact.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id" required>
                    @foreach($categories as $id => $entry)
                        <option value="{{ $id }}" {{ (old('category_id') ? old('category_id') : $contact->category->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contact.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.contact.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $contact->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contact.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mobile">{{ trans('cruds.contact.fields.mobile') }}</label>
                <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="number" name="mobile" id="mobile" value="{{ old('mobile', $contact->mobile) }}" step="1">
                @if($errors->has('mobile'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mobile') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contact.fields.mobile_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.contact.fields.is_delivered') }}</label>
                <select class="form-control {{ $errors->has('is_delivered') ? 'is-invalid' : '' }}" name="is_delivered" id="is_delivered" required>
                    <option value disabled {{ old('is_delivered', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Contact::IS_DELIVERED_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('is_delivered', $contact->is_delivered) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('is_delivered'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_delivered') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contact.fields.is_delivered_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.contact.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $contact->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contact.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gift_id">{{ trans('cruds.contact.fields.gift') }}</label>
                <select class="form-control select2 {{ $errors->has('gift') ? 'is-invalid' : '' }}" name="gift_id" id="gift_id">
                    @foreach($gifts as $id => $entry)
                        <option value="{{ $id }}" {{ (old('gift_id') ? old('gift_id') : $contact->gift->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('gift'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gift') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contact.fields.gift_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="area">{{ trans('cruds.contact.fields.area') }}</label>
                <input class="form-control {{ $errors->has('area') ? 'is-invalid' : '' }}" type="text" name="area" id="area" value="{{ old('area', $contact->area) }}">
                @if($errors->has('area'))
                    <div class="invalid-feedback">
                        {{ $errors->first('area') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contact.fields.area_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.contact.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $contact->address) }}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contact.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection