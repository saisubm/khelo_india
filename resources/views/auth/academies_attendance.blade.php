@include('includes.header')

<div class="athelete-supported py-4 py-md-5 academic-details">
    <div class="container">
        <div class="text-center mb-3 mb-md-4">
            <h1 class="text-center">Academies</h1>
        </div>
        <div class="card box-shadow p-3 bg-white shadow border-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="data_table">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th style="width: 40%">Name</th>
                            <th style="width: 40%">No.of Academy</th>
                            <th align="right" class="text-end">View Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($data))
                            @foreach ($data as $key => $value)
                                <tr class='clickable-row' data-href="{{url('/academic_details/'.encode5t($value['SchemeId']).'/'.encode5t($value['SchemeName']))}}">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $value['SchemeName'] ?? '' }}</td>
                                    <td>{{ $value['AcademyCount'] ?? '' }}</td>
                                    <td align="right">
                                       <a href ="{{url('/academic_details/'.encode5t($value['SchemeId']).'/'.encode5t($value['SchemeName']))}}">
                                        <button class="btn"><i class="fas fa-eye"></i></button>
                                       </a> 
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" align="center">
                                    {{ __('No Data Found') }}
                                </td>
                            </tr>

                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')
<script>
    $(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>