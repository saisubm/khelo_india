@include('includes.header')
<div class="ss-finance">
    <div class="container py-5">
        <div class="row align-items-center py-1" style="font-size: 33px; font-weight:700;  border-radius:7px; border: 1px solid #AFAFB4;">
            <div class="col-lg-1 col-md-2 col-3" style="display: flex">
                <button type="button" onclick="{history.back()}" class="background-light border-0" style="background-color: transparent !important">
                    <img src="{{ asset('public/front/assets/images/svg/backward-arrow.svg')}}" class="img-fluid backward-arrow d-block m-auto"
                        alt="" />
                </button>
            </div>
            <div class="col-lg-11 col-md-10 col-9">
                <h2 class="text-center mb-0" style="font-size: 33px; font-weight:700; ">Sports School Details</h2>
            </div>
        </div>
        <div class="row mt-5">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead style="vertical-align: middle; align-items: center; text-align: center;">
                        <tr>
                            <th style="min-width: 150px;">SN</th>
                            <th style="min-width: 150px;">State/UT</th>
                            <th style="min-width: 150px;">District</th>
                            <th style="min-width: 150px;">Centre Name</th>
                            <th style="min-width: 150px;">Disciplines</th>
                            <th style="min-width: 150px;">Male</th>
                            <th style="min-width: 150px;">Female</th>
                            <th style="min-width: 150px;">Total</th>
                            <th style="min-width: 150px;">Location</th>
                            <th style="min-width: 150px;">Academy Type</th>

                            <th style="min-width: 150px;">No. of Coaches Deployed</th>
                            <th style="min-width: 150px;">Name of Coach Deployed</th>



                        </tr>
                    </thead>
                    <tbody style="vertical-align: middle; align-items: center; text-align: center;">
                        <tr>
                            <td rowspan="2">1</td>
                            <td rowspan="2">Uttar Pradesh</td>
                            <td rowspan="2">Ghaziabad</td>
                            <td rowspan="2">KVKNN (Ghaziabad)</td>
                            <td>Volleyball</td>
                            <td>10</td>
                            <td>-</td>
                            <td>10</td>
                            <td rowspan="2">
                                <a href="https://www.google.com/maps/place/28%C2%B040'47.5%22N+77%C2%B027'45.8%22E/@28.6798611,77.4605335,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x9a5ea8dc0ac3834b!8m2!3d28.6798611!4d77.4627222"
                                    class="text-decoration-none text-white"><button type="button"
                                        class="btn btn-primary">Click Here</button></a>
                            </td>
                            <td rowspan="2">Sports School</td>

                            <td>1</td>
                            <td>Ankur Kumar</td>

                        </tr>

                        <tr>
                            <td>Athletics</td>
                            <td>12</td>
                            <td>-</td>
                            <td>12</td>
                            <td>1</td>
                            <td>Naresh Kumar Sharma</td>

                        </tr>
                        <tr>
                            <td rowspan="2">2</td>
                            <td rowspan="2">Madhya Pradesh</td>
                            <td rowspan="2">Gwalior</td>
                            <td rowspan="2">Kendriya Vidyalaya No.1 (Gwalior)</td>
                            <td>Athletics</td>
                            <td>-</td>
                            <td>10</td>
                            <td>10</td>
                            <td rowspan="2">
                                <a href="https://www.google.com/maps/place/26%C2%B012'55.7%22N+78%C2%B011'26.8%22E/@26.2154722,78.1885891,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0xef25972dba6ad855!8m2!3d26.2154722!4d78.1907778"
                                    class="text-decoration-none text-white"><button type="button"
                                        class="btn btn-primary">Click Here</button></a>
                            </td>
                            <td rowspan="2">Sports School</td>

                            <td>1</td>
                            <td>Nishil jadhav</td>

                        </tr>

                        <tr>
                            <td>Shooting</td>
                            <td>-</td>
                            <td>8</td>
                            <td>8</td>
                            <td>-</td>
                            <td>-</td>

                        </tr>
                        <tr>
                            <td rowspan="2">3</td>
                            <td rowspan="2">Madhya Pradesh</td>
                            <td rowspan="2">Sidhi</td>
                            <td rowspan="2">Kendriya Vidyalaya (sidhi)</td>
                            <td>Boxing</td>
                            <td>2</td>
                            <td>-</td>
                            <td>2</td>
                            <td rowspan="2">
                                <a href="https://www.google.com/maps/place/24%C2%B024'45.3%22N+81%C2%B051'57.7%22E/@24.4125833,81.8638391,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0xf7503c5b2595728b!8m2!3d24.4125833!4d81.8660278"
                                    class="text-decoration-none text-white"><button type="button"
                                        class="btn btn-primary">Click Here</button></a>
                            </td>
                            <td rowspan="2">Sports School</td>

                            <td>1</td>
                            <td>Gyanendra Sharma</td>

                        </tr>

                        <tr>
                            <td>Archery</td>
                            <td>3</td>
                            <td>-</td>
                            <td>3</td>
                            <td>1</td>
                            <td>Anuj</td>

                        </tr>
                        <tr>
                            <td rowspan="2">4</td>
                            <td rowspan="2">New Delhi</td>
                            <td rowspan="2">SouthWest Delhi</td>
                            <td rowspan="2">Kendriya Vidyalaya No. 1 (Delhi Cantt) (sidhi)</td>
                            <td>Archery</td>
                            <td>3</td>
                            <td>-</td>
                            <td>3</td>
                            <td rowspan="2">
                                <a href="https://www.google.com/maps/place/28%C2%B035'26.9%22N+77%C2%B007'06.0%22E/@28.5908056,77.1161446,17z/data=!4m5!3m4!1s0x0:0xf41972a0e09323c7!8m2!3d28.5908056!4d77.1183333"
                                    class="text-decoration-none text-white"><button type="button"
                                        class="btn btn-primary">Click Here</button></a>
                            </td>
                            <td rowspan="2">Sports School</td>

                            <td>1</td>
                            <td>Mandeep Kaur</td>

                        </tr>

                        <tr>
                            <td>Judo</td>
                            <td>-</td>
                            <td>6</td>
                            <td>6</td>
                            <td>1</td>
                            <td>Samiksha Bhatnagar</td>

                        </tr>

                        <tr>
                            <td rowspan="3">5</td>
                            <td rowspan="3">Meghalaya</td>
                            <td rowspan="3">Shillong</td>
                            <td rowspan="3">Assam Rifle Public School, Shillong</td>
                            <td>Athletic</td>
                            <td>12</td>
                            <td>9</td>
                            <td>21</td>
                            <td rowspan="3">
                                <a href="https://www.google.com/maps/place/25%C2%B031'03.1%22N+91%C2%B052'36.4%22E/@25.5175278,91.8745891,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x2d973a2a4d571c4d!8m2!3d25.5175278!4d91.8767778"
                                    class="text-decoration-none text-white"><button type="button"
                                        class="btn btn-primary">Click Here</button></a>
                            </td>
                            <td rowspan="3">Sports School</td>

                            <td>-</td>
                            <td>-</td>


                        </tr>
                        <tr>
                            <td>Archery</td>
                            <td>14</td>
                            <td>3</td>
                            <td>17</td>
                            <td>1</td>
                            <td>Abhay Dev</td>

                        </tr>

                        <tr>
                            <td>Fencing</td>
                            <td>16</td>
                            <td>5</td>
                            <td>21</td>
                            <td>-</td>
                            <td>-</td>

                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')