
@if ($errors->any())
    <p class="mt-2 alert alert-danger per_fonts" style="margin-left: 15px;
    margin-right:10px;
    padding-left:10px;">
        {{ $errors->all()[0] }}
    </p>
@endif
