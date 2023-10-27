@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.gift.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.gifts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.gift.fields.id') }}
                        </th>
                        <td>
                            {{ $gift->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gift.fields.name') }}
                        </th>
                        <td>
                            {{ $gift->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gift.fields.type') }}
                        </th>
                        <td>
                            {{ $gift->type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gift.fields.quantity') }}
                        </th>
                        <td>
                            {{ $gift->quantity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gift.fields.cost') }}
                        </th>
                        <td>
                            {{ $gift->cost }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.gifts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection