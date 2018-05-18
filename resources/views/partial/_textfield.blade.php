<!-- {{ $label ?? ucwords($name )}} Form Input -->
<div class="form-group{{ $errors->has($name) ? 'has-error' : '' }}">
    <label for="{{ $name }}" class="control-label">{{ $label ?? ucwords($name) }}</label>
    <input id="{{ $name }}" type="{{ $type ?? 'text' }}" class="form-control" name="{{ $name }}" value="{{ old($name) }}" {!! $attr ?? '' !!}>

    @if ($errors->has($name))
        <span class="help-block">
            <strong>{{ $errors->first($name) }}</strong>
        </span>
    @endif
</div>