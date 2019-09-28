                                    </div>
                                </div>
                            </div>                                
                        </div>                            
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <script type="text/javascript" src="{{asset('public/backEnd/components/jquery-ui/js/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/backEnd/components/popper.js/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/backEnd/components/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- Yazra Datatable -->
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{asset('public/backEnd/components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{asset('public/backEnd/components/modernizr/js/modernizr.js')}}"></script>
    <!-- Chart js -->
    <script type="text/javascript" src="{{asset('public/backEnd/components/chart.js/js/Chart.js')}}"></script>
    <!-- amchart js -->
    <script src="{{asset('public/backEnd/assets/pages/widget/amchart/amcharts.js')}}" type="text/javascript"></script>
    <script src="{{asset('public/backEnd/assets/pages/widget/amchart/serial.js')}}" type="text/javascript"></script>
    <script src="{{asset('public/backEnd/assets/pages/widget/amchart/light.js')}}" type="text/javascript"></script>
    <script src="{{asset('public/backEnd/assets/js/jquery.mCustomScrollbar.concat.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('public/backEnd/assets/js/SmoothScroll.js')}}"></script>
    <script src="{{asset('public/backEnd/assets/js/pcoded.min.js')}}" type="text/javascript"></script>
    <!-- custom js -->
    <script src="{{asset('public/backEnd/assets/js/vartical-layout.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('public/backEnd/assets/pages/dashboard/custom-dashboard.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/backEnd/assets/js/script.min.js')}}"></script> 
    <script type="text/javascript" src="{{asset('public/backEnd/js/form.js')}}"></script> 
    
    <!-- Sweet Alert -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <!-- Ck Editor -->
    <script src="{{asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('/vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>
   
    @yield('script')

    <script>
        // CK Editor
        $('#editor').ckeditor();

        // Error Message
        function errorMessage(sms = null){
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: sms === null ?'Something went wrong! Try again Later':sms
            });
        }

        //Success message
        function successMessage(sms = null){
            Swal.fire({
                type: 'success',
                title: sms === null ?'successfully':sms,
                showConfirmButton: false,
                timer: 3000
            }); 
        }
    </script>

    @if(Session::has('success'))
    <script>
        successMessage('{{Session::get('success')}}');
    </script>
    @endif
    @if(Session::has('error'))
    <script>
        errorMessage('{{Session::get('error')}}');
    </script>
    @endif
    
</body>
</html>
