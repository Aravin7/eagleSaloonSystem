<!DOCTYPE html>
<html>
    <head>
        <title>Leave Application</title>
    </head>
    <body>
        <h1>Leave Application</h1>
        <form action="leave_application.php" method="post">
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date" onchange="calculateEndDate()" required>

            <label for="number_of_days">Number of Days:</label>
            <input type="number" id="number_of_days" name="number_of_days" step="0.5" min="0.5" max="30" onchange="calculateEndDate()" required>

            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date" readonly>

            <div id="half_day_leave_div" style="display:none;">
                <label for="half_day_leave">Half Day Leave:</label>
                <select id="half_day_leave" name="half_day_leave">
                    <option value="morning">Morning</option>
                    <option value="afternoon">Afternoon</option>
                </select>
            </div>
            <div id="half_day_leave_day_div" style="display:none;">
                <label for="half_day_leave_day">Which Day Half-Leave:</label>
                <select id="half_day_leave_day" name="half_day_leave_day">

                </select>
            </div>
            <input type="submit" value="Submit">
        </form>
        <script src="assets/js/custom.js" type="text/javascript"></script>
    </body>
</html>






<!--dashboard  things-->

  <div class="row">
        <div class="col-md-6 col-xl-6 mb-md-5 mb-xl-10">

            <!--begin::Card widget 13-->
            <div class="card overflow-hidden h-md-50 mb-5 mb-xl-10">
                <!--begin::Card body-->
                <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                    <!--begin::Statistics-->
                    <div class="mb-4 px-9">   
                        <!--begin::Statistics-->
                        <div class="d-flex align-items-center mb-2">   


                            <!--begin::Value-->
                            <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">259,786</span>
                            <!--end::Value-->

                            <!--begin::Label-->

                            <!--end::Label-->       
                        </div>
                        <!--end::Statistics-->

                        <!--begin::Description-->
                        <span class="fs-6 fw-semibold text-gray-400">Total Shipments</span>
                        <!--end::Description-->
                    </div>
                    <!--end::Statistics-->        

                    <!--begin::Chart-->
                    <div id="kt_card_widget_13_chart" class="min-h-auto" style="height: 125px; min-height: 140px;"><div id="apexcharts315d5srf" class="apexcharts-canvas apexcharts315d5srf apexcharts-theme-light" style="width: 363px; height: 125px;"><svg id="SvgjsSvg3000" width="363" height="125" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg apexcharts-zoomable" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG3002" class="apexcharts-inner apexcharts-graphical" transform="translate(-10, 30)"><defs id="SvgjsDefs3001"><clipPath id="gridRectMask315d5srf"><rect id="SvgjsRect3005" width="398" height="102" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMask315d5srf"></clipPath><clipPath id="nonForecastMask315d5srf"></clipPath><clipPath id="gridRectMarkerMask315d5srf"><rect id="SvgjsRect3006" width="396" height="104" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><g id="SvgjsG3013" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG3014" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG3030" class="apexcharts-grid"><g id="SvgjsG3031" class="apexcharts-gridlines-horizontal"><line id="SvgjsLine3033" x1="0" y1="0" x2="392" y2="0" stroke="#eaeaea" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine3034" x1="0" y1="25" x2="392" y2="25" stroke="#eaeaea" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine3035" x1="0" y1="50" x2="392" y2="50" stroke="#eaeaea" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine3036" x1="0" y1="75" x2="392" y2="75" stroke="#eaeaea" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine3037" x1="0" y1="100" x2="392" y2="100" stroke="#eaeaea" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG3032" class="apexcharts-gridlines-vertical"></g><line id="SvgjsLine3039" x1="0" y1="100" x2="392" y2="100" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine3038" x1="0" y1="1" x2="0" y2="100" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG3007" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG3008" class="apexcharts-series" seriesName="Shipments" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath3011" d="M 0 100L 0 87.5C 11.433333333333332 87.5 21.233333333333334 12.5 32.666666666666664 12.5C 44.099999999999994 12.5 53.9 75 65.33333333333333 75C 76.76666666666667 75 86.56666666666666 50 98 50C 109.43333333333334 50 119.23333333333332 75 130.66666666666666 75C 142.1 75 151.9 25 163.33333333333334 25C 174.76666666666668 25 184.56666666666666 62.5 196 62.5C 207.43333333333334 62.5 217.23333333333335 75 228.66666666666669 75C 240.1 75 249.9 62.5 261.3333333333333 62.5C 272.76666666666665 62.5 282.56666666666666 25 294 25C 305.43333333333334 25 315.23333333333335 37.5 326.6666666666667 37.5C 338.1 37.5 347.9 12.5 359.3333333333333 12.5C 370.76666666666665 12.5 380.56666666666666 62.5 392 62.5C 392 62.5 392 62.5 392 100M 392 62.5z" fill="rgba(184,217,53,0)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask315d5srf)" pathTo="M 0 100L 0 87.5C 11.433333333333332 87.5 21.233333333333334 12.5 32.666666666666664 12.5C 44.099999999999994 12.5 53.9 75 65.33333333333333 75C 76.76666666666667 75 86.56666666666666 50 98 50C 109.43333333333334 50 119.23333333333332 75 130.66666666666666 75C 142.1 75 151.9 25 163.33333333333334 25C 174.76666666666668 25 184.56666666666666 62.5 196 62.5C 207.43333333333334 62.5 217.23333333333335 75 228.66666666666669 75C 240.1 75 249.9 62.5 261.3333333333333 62.5C 272.76666666666665 62.5 282.56666666666666 25 294 25C 305.43333333333334 25 315.23333333333335 37.5 326.6666666666667 37.5C 338.1 37.5 347.9 12.5 359.3333333333333 12.5C 370.76666666666665 12.5 380.56666666666666 62.5 392 62.5C 392 62.5 392 62.5 392 100M 392 62.5z" pathFrom="M -1 125L -1 125L 32.666666666666664 125L 65.33333333333333 125L 98 125L 130.66666666666666 125L 163.33333333333334 125L 196 125L 228.66666666666669 125L 261.3333333333333 125L 294 125L 326.6666666666667 125L 359.3333333333333 125L 392 125"></path><path id="SvgjsPath3012" d="M 0 87.5C 11.433333333333332 87.5 21.233333333333334 12.5 32.666666666666664 12.5C 44.099999999999994 12.5 53.9 75 65.33333333333333 75C 76.76666666666667 75 86.56666666666666 50 98 50C 109.43333333333334 50 119.23333333333332 75 130.66666666666666 75C 142.1 75 151.9 25 163.33333333333334 25C 174.76666666666668 25 184.56666666666666 62.5 196 62.5C 207.43333333333334 62.5 217.23333333333335 75 228.66666666666669 75C 240.1 75 249.9 62.5 261.3333333333333 62.5C 272.76666666666665 62.5 282.56666666666666 25 294 25C 305.43333333333334 25 315.23333333333335 37.5 326.6666666666667 37.5C 338.1 37.5 347.9 12.5 359.3333333333333 12.5C 370.76666666666665 12.5 380.56666666666666 62.5 392 62.5" fill="none" fill-opacity="1" stroke="#403d38" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask315d5srf)" pathTo="M 0 87.5C 11.433333333333332 87.5 21.233333333333334 12.5 32.666666666666664 12.5C 44.099999999999994 12.5 53.9 75 65.33333333333333 75C 76.76666666666667 75 86.56666666666666 50 98 50C 109.43333333333334 50 119.23333333333332 75 130.66666666666666 75C 142.1 75 151.9 25 163.33333333333334 25C 174.76666666666668 25 184.56666666666666 62.5 196 62.5C 207.43333333333334 62.5 217.23333333333335 75 228.66666666666669 75C 240.1 75 249.9 62.5 261.3333333333333 62.5C 272.76666666666665 62.5 282.56666666666666 25 294 25C 305.43333333333334 25 315.23333333333335 37.5 326.6666666666667 37.5C 338.1 37.5 347.9 12.5 359.3333333333333 12.5C 370.76666666666665 12.5 380.56666666666666 62.5 392 62.5" pathFrom="M -1 125L -1 125L 32.666666666666664 125L 65.33333333333333 125L 98 125L 130.66666666666666 125L 163.33333333333334 125L 196 125L 228.66666666666669 125L 261.3333333333333 125L 294 125L 326.6666666666667 125L 359.3333333333333 125L 392 125"></path><g id="SvgjsG3009" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle3047" r="0" cx="0" cy="0" class="apexcharts-marker wzzjeok8d no-pointer-events" stroke="#403d38" fill="#b8d935" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG3010" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine3041" x1="0" y1="0" x2="0" y2="100" stroke="#403d38" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="100" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><line id="SvgjsLine3042" x1="0" y1="0" x2="392" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine3043" x1="0" y1="0" x2="392" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG3044" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG3045" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG3046" class="apexcharts-point-annotations"></g><rect id="SvgjsRect3048" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-zoom-rect"></rect><rect id="SvgjsRect3049" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-selection-rect"></rect></g><g id="SvgjsG3028" class="apexcharts-yaxis" rel="0" transform="translate(-8, 0)"><g id="SvgjsG3029" class="apexcharts-yaxis-texts-g"></g></g><rect id="SvgjsRect3040" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g id="SvgjsG3003" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 62.5px;"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: inherit; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(184, 217, 53);"></span><div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light"><div class="apexcharts-xaxistooltip-text" style="font-family: inherit; font-size: 12px;"></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                    <!--end::Chart--> 
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card widget 13-->




            <!--begin::Card widget 7-->
            <div class="card card-flush h-md-50 mb-lg-10">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <div class="card-title d-flex flex-column">                
                        <!--begin::Amount-->
                        <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">604</span>
                        <!--end::Amount-->           

                        <!--begin::Subtitle-->
                        <span class="text-gray-400 pt-1 fw-semibold fs-6">New Customers This Month</span>
                        <!--end::Subtitle--> 
                    </div>
                    <!--end::Title-->           
                </div>
                <!--end::Header-->

                <!--begin::Card body-->
                <div class="card-body d-flex flex-column justify-content-end pe-0">
                    <!--begin::Title-->
                    <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">Today’s Heroes</span>
                    <!--end::Title-->

                    <!--begin::Users group-->
                    <div class="symbol-group symbol-hover flex-nowrap">
                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" data-kt-initialized="1">
                            <span class="symbol-label bg-warning text-inverse-warning fw-bold">A</span>
                        </div>
                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Michael Eberon" data-kt-initialized="1">
                            <img alt="Pic" src="/good/assets/media/avatars/300-11.jpg">
                        </div>
                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" data-kt-initialized="1">
                            <span class="symbol-label bg-primary text-inverse-primary fw-bold">S</span>
                        </div>
                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Melody Macy" data-kt-initialized="1">
                            <img alt="Pic" src="/good/assets/media/avatars/300-2.jpg">
                        </div>
                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" data-kt-initialized="1">
                            <span class="symbol-label bg-danger text-inverse-danger fw-bold">P</span>
                        </div>
                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Barry Walter" data-kt-initialized="1">
                            <img alt="Pic" src="/good/assets/media/avatars/300-12.jpg">
                        </div>
                        <a href="#" class="symbol symbol-35px symbol-circle" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">
                            <span class="symbol-label bg-light text-gray-400 fs-8 fw-bold">+42</span>
                        </a>
                    </div>
                    <!--end::Users group-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card widget 7-->       
        </div>
    </div>