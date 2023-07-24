<div class="d1 p">
    <img src="storage/films_images/{{$data[$index]['image_name'] }}" alt="تصویر ندارد">
</div>
<div class="d2">
    <p>
        {{ $data[$index]['film_name'] }}
    </p>
</div>
<div class="d3">
    <p>
        <a href="buybill/{{ $data[$index] }}">
            ...اطلاعات بیشتر
        </a>
    </p>
</div>
