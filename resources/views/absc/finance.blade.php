@include('includes.header')
<div class="ss-finance">
    <div class="container py-5">
        <div class="row align-items-center" style="font-size: 33px; font-weight:700; padding:10px; border-radius:7px; border: 1px solid #AFAFB4;">
      <div class="col-lg-1 col-md-2 col-3">
        <button type="button" onclick="{history.back()}" class="background-light border-0 d-block" style="background-color: transparent !important">
            <img src="{{ asset('public/front/assets/images/svg/backward-arrow.svg')}}" class="img-fluid backward-arrow d-block mx-auto"
                alt="" />
        </button>
      </div>
      <div class="col-lg-11 col-md-10 col-9">
        <h2 class="text-center" style="font-size: 33px; font-weight:700; ">ABSC Finance</h2>
      </div>
    </div>
        <div class="row mt-5">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead style="vertical-align: middle; align-items: center; text-align: center;">
                            <tr>
                                <th rowspan="2">
                                    Entity
                                </th>
                                <th colspan="2">
                                    Year 2021-22
                                </th>
                                <th colspan="2">
                                    Year 2020-21
                                </th>

                            </tr>
                            <tr>
                                <th>Sanctioned Amt. (Rs. in lakhs)</th>
                                <th>Released Amount (Rs. in lakhs)</th>
                                <th>Sanctioned Amt. (Rs. in lakhs)</th>
                                <th>Released Amount (Rs. in lakhs)</th>
                            </tr>
                        </thead>
                        <tbody style="vertical-align: middle; align-items: center; text-align: center;">
                            <tr>
                                <td>Indian Army</td>
                                <td>7,72,43,701</td>
                                <td>7,72,43,701</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>Indian Navy</td>
                                <td>18,43,226</td>
                                <td>18,43,226</td>
                                <td>1235250</td>
                                <td>1235250</td>
                            </tr>
                            <tr>
                                <td>Indian Airforce</td>
                                <td>14,28,526</td>
                                <td>14,28,526</td>
                                <td>4335000</td>
                                <td>4335000</td>
                            </tr>


                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@include('includes.footer')