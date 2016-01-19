@include('layout.partials.head')

<div class="row">
    <div class="col-lg-12 not-found-wrapper">
        <div class="not-found-container">
            <div class="not-found-content service-not-found-content" style="padding-top: 100px;">
                <h1 style="font-size: 100px;"><strong>404</strong></h1>
                <p>@lang('global.page_doesnt_exist')</p>
                <p>@lang('global.if_you_are_looking', ['home' => '<a href="'.url('/').'">Home</a>'])</p>
            </div>
        </div>
    </div>
</div>

</body>
</html>