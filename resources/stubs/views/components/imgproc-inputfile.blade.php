@props(['class' => '', 'name' => ''])

<div class="row" id="imgproc-edit">
    <div class="col-md-3 mb-2">
        <div class="w-100 text-center">
            <i class="fas fa-pencil-alt imgproc-edit-icon"></i>
            <button type="button" id="imgproc-editbtn" title="Edit Image">
                <img src="" alt="Edit Image" class="mw-100">
            </button>
        </div>
    </div>
</div>
<input type="file" class="form-control {{ $class }}" accept="image/*" id="imgproc-input" name="{{ $name }}">