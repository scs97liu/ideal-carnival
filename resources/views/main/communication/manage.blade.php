@extends('main.layout.main')

@push('css')
    <link rel="stylesheet" href="{{ asset('/css/forms.css') }}">
@endpush

@section('content')
    <div class="portlet box">
        <div class="portlet-body">
            <div class="row">
                <div class="col-sm-12">
                    <h3>Current Medical Professionals</h3>
                </div>
            </div>
            <hr>
            @include('main.communication._prof_container')
            <hr>
            <div class="row">
                <div class="col-sm-12">
                    <h3>Add New Medical Professionals</h3>
                </div>
            </div>
            <hr>
            <div class="row">
                    <div class="form-group form-group-lg">
                        <div class="col-sm-5">
                            <select id="select2-button-addons-single-input-group-sm" class="form-control js-data-example-ajax">
                                <option value="2126244" selected="selected">Search For Medical Professionals</option>
                            </select>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <form id="add-prof-form" method="POST" action="{{ route('communication.prof.add') }}">
        <input type="hidden" name="id" value="">
    </form>
    <form id="delete-prof-form" action="{{ route('communication.prof.delete') }}" method="POST">
        <input type="hidden" name="id" value="">
    </form>
@endsection

@push('js')
    <script src="{{ asset('/js/forms.js') }}" type="text/javascript"></script>
    <script>
        $.fn.select2.defaults.set("theme", "bootstrap");

        function formatRepo(repo) {
            console.log(repo)
            if (repo.loading) return repo.text;

            var markup = "<div class='select2-result-repository clearfix'>" +
                "<div class='select2-result-repository__avatar'><img src='/layout/img/team1.jpg' /></div>" +
                "<div class='select2-result-repository__meta'>" +
                "<div class='select2-result-repository__title'>" + repo.first_name + " " + repo.last_name + "</div>";

            if (repo.professional) {
                markup += "<div class='select2-result-repository__description'>" + repo.professional.title + "</div>";
            }

            return markup;
        }

        function formatRepoSelection(repo) {
            if(repo.text) return repo.text;
            if(repo.professional)
            {
                var $form = $('#add-prof-form')
                $('input', $form).val(repo.professional.id)
                $form.submit();
            }
        }

        $(".js-data-example-ajax").select2({
            width: "off",
            ajax: {
                url: "{{ route('communication.prof.search') }}",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function(data, page) {
                    return {
                        results: data
                    };
                },
                cache: true
            },
            escapeMarkup: function(markup) {
                return markup;
            },
            minimumInputLength: 1,
            templateResult: formatRepo,
            templateSelection: formatRepoSelection
        });
    </script>
    <script>
        $('.delete-prof').click(function(e){
            if(confirm('Are you sure you wish to remove this medical professional?')){
                var $form = $('#delete-prof-form')
                var id = $(this).data('id');
                $('input', $form).val(id)
                $form.submit()
            }
        })
    </script>
@endpush
