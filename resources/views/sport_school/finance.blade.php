@include('includes.header')
<div class="ss-finance">
    <div class="container py-5">
        <div class="row align-items-center"  style="font-size: 33px; font-weight:700; padding:10px; border-radius:7px; border: 1px solid #AFAFB4;">
      <div class="col-lg-1 col-md-2 col-3">
        <button type="button" onclick="{history.back()}" class="background-light border-0 d-block" style="background-color: transparent !important">
            <img src="{{ asset('public/front/assets/images/svg/backward-arrow.svg')}}" class="img-fluid backward-arrow d-block mx-auto"
                alt="" />
        </button>
      </div>
      <div class="col-lg-11 col-md-10 col-9">
        <h2 class="text-center" style="font-size: 33px; font-weight:700;">Sports School Finance</h2>
      </div>
    </div>
        <div class="row mt-5">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead style="vertical-align: middle; align-items: center; text-align: center;">
                            <tr>
                                <th rowspan="2">
                                    Name of Sports School
                                </th>
                                <th colspan="2">
                                    Year 2021-22
                                </th>
                                <th colspan="2">
                                    Year 2019-20
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
                                <td>KVKNN (Ghaziabad)</td>
                                <td>22,71,264</td>
                                <td>22,71,264</td>
                                <td>37,00,000</td>
                                <td>37,00,000</td>
                            </tr>
                            <tr>
                                <td>Kendriya Vidyalaya No.1 (Gwalior)</td>
                                <td>14,05,458</td>
                                <td>14,05,458</td>
                                <td>50,00,000</td>
                                <td>50,00,000</td>
                            </tr>
                            <tr>
                                <td>Kendriya Vidyalaya (Sidhi)</td>
                                <td>3,98,821</td>
                                <td>3,98,821</td>
                                <td>31,00,000</td>
                                <td>31,00,000</td>
                            </tr>
                            <tr>
                                <td>Kendriya Vidyalaya No.1 (Delhi Cantt)</td>
                                <td>10,20,162</td>
                                <td>10,20,162</td>
                                <td>36,00,000</td>
                                <td>36,00,000</td>
                            </tr>
                            <tr>
                                <td>Assam Rifle Public School, Shillong</td>
                                <td>64,78,016</td>
                                <td>64,78,016</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@include('includes.footer')