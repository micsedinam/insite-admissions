<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{$details->name}}'s Transcript</title>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
  <link href="//netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" />

    {{-- <style>
        body {
            background-image: url('{{asset("img/transcript-bg.png")}}');
            background-repeat: no-repeat;
        }
    </style> --}}

</head>

<body class="antialiased" onload="">
    <div class="container" style="background-image: url('{{asset("img/transcript-header.png")}}'); background-repeat: no-repeat; background-size: 100% 10%;">
        <div class="row justify-content-center">
            <div class="col-md-12 mb-4">
                <div class=" border-bottom-warning">
                    <div class="card-body">
                        {{-- <div class="row">
                            <div class="col-md-8">
                                <div class="text-center">
                                    <img class="col-md-4 mb-2" src="{{asset('img/insite-logo-black-text.png')}}" alt="IMC Logo">
                                    <h2 class="text-primary">INSITE MEDIA COLLEGE</h2>
                                    <h3 class="text-primary">ACADEMIC AFFAIRS</h3>
                                    <h6><i class="fa fa-archive"></i> P.O BOX MS 298, MILE 7 - ACCRA | <i class="fa fa-phone-square"></i> +233(0)540441833 / +233(0)302408701</h6>
                                    <h6 class="text-dark"><i class="fa fa-envelope"></i> insitemediacollege@gmail.com</h6>
                                    <h6 class="text-dark"><i class="fa fa-globe"></i> insitemediacollege.edu.gh</h6>
                                </div> 
                            </div>
                            <div class="col-md-4">
                                <img class="mb-2" src="{{asset('image_uploads/'.$details->profile_photo)}}" width="200px" height="200px" alt="IMC Logo">
                            </div>
                        </div>

                        <div class="text-center">
                            <div class="col-md-2 offset-md-8">
                                <h4 style="background-color: rgb(0, 123, 255); height: 30px; width: 200px; align: center; color: #fff;">DIPLOMA</h4>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-dark"><strong>Name:</strong> {{$details->name}} </h5>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-dark"><strong>Index Number:</strong> {{$details->index_number}}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-dark"><strong>Academic Year:</strong> 2022/2023 </h5>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-dark">Student Transcript</h5>
                            </div>
                        </div> --}}

                        {{-- <h5 class="text-dark"><strong>Department:</strong> {{$details->dept_name}}</h5> --}}
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        {{-- <div class="">
                            <h3 class="text-center">STUDENT TRANSCRIPT</h3>
                        </div> --}}

                        <!-- Level 100 Scores -->
                        <div class="table-responsive">
                            <h5>Level 100 - Semester 1</h5>
                            <table class="table table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <th>Course Code</th>
                                    <th>Course Title</th>
                                    <th>Credit Hours</th>
                                    <th>Grade</th>
                                    <th>Weight</th>
                                    <th>Grade Point</th>
                                </thead>
                                <tbody>
                                    @php
                                        $totalgp = 0.0;
                                        $totalcdthr = 0;
                                    @endphp
                                    @foreach ($trans as $course)
                                        @if ($course->level == 100 && $course->semester == 1)
                                            <?php 

                                                //Calculate the grade
                                                $score = $course->total_marks;
                                                //dd($score);
                                                switch ($weight = $score) 
                                                {
                                                    case $score >= 80 || $score == 100:
                                                        $weight = 4.0;
                                                        break;
                                                    case $score >= 75:
                                                        $weight =  3.5;
                                                        break;
                                                    case $score >= 70:
                                                        $weight =  3.0;
                                                        break;
                                                    case $score >= 65:
                                                        $weight =  2.5;
                                                        break;
                                                    case $score >= 60:
                                                        $weight =  2.0;
                                                        break;
                                                    case $score >= 55:
                                                        $weight =  1.5;
                                                        break;
                                                    case $score >= 50:
                                                        $weight =  1.0;
                                                        break;
                                                    case $score < 49 || $score == 0:
                                                        $weight =  0;
                                                        break;
                                                }
                                            ?>
                                            <tr class="record">
                                                <td>{{ $course->course_code }}</td>
                                                <td>{{ $course->course_title }}</td>
                                                <td class="sem1 creditHour" id="creditHour">
                                                    <?php
                                                        $credithour = $course->credit_hours;
                                                        $totalcdthr += $credithour;
                                                        echo $credithour;
                                                    ?>
                                                </td>
                                                <td>
                                                    @php
                                                        //Calculate the grade
                                                        $score = $course->total_marks;
                                                        switch ($score) {
                                                            case $score >=80 || $score==100:
                                                                echo "A";
                                                                break;
                                                            case $score >=75:
                                                                echo "B+";
                                                                break;
                                                            case $score >=70:
                                                                echo "B";
                                                                break;
                                                            case $score >=65:
                                                                echo "C+";
                                                                break;
                                                            case $score >=60:
                                                                echo "C";
                                                                break;
                                                            case $score >=55:
                                                                echo "D+";
                                                                break;
                                                            case $score >=50:
                                                                echo "D";
                                                                break;
                                                            case $score <49 || $score==0:
                                                                echo "E";
                                                                break;
                                                        }
                                                        $name = "Yaw";
                                                    @endphp
                                                </td>
                                                
                                                <td class="weight" id="weight">
                                                    @php
                                                        echo $weight;
                                                    @endphp
                                                </td>
                                                <td class="" id="gp-{{ $course->course_code }}" >
                                                @php
                                                    $gradepoint = $weight * $course->credit_hours;
                                                    $totalgp += $gradepoint;
                                                    echo $gradepoint;
                                                @endphp
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td><strong>Total Credit Hours:</strong></td>
                                        <td><strong class="totalsem1">
                                            @php
                                                echo $totalcdthr;
                                            @endphp    
                                        </strong></td>
                                        <td></td>
                                        <td><strong>Total Grade Point:</strong></td>
                                        <td><strong class="totalgpa"> 
                                            @php
                                                echo $totalgp;
                                            @endphp 
                                        </strong></td>
                                    </tr>
                                </tbody>
                            </table>
                                @php
                                    //$semestergpa = $totalgp/$totalcdthr;
                                    //echo "Semseter GPA: ". $semestergpa;
                                @endphp
                            <br>
                            <hr>
                            <br>
                            
                            <h5>Level 100 - Semester 2</h5>
                            <table class="table table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <th>Course Code</th>
                                    <th>Course Title</th>
                                    <th>Credit Hours</th>
                                    <th>Grade</th>
                                    <th>Weight</th>
                                    <th>Grade Point</th>
                                </thead>
                                <tbody>
                                    @php
                                        $totalgp = 0.0;
                                        $totalcdthr = 0;
                                    @endphp
                                    @foreach ($trans as $course)
                                        @if ($course->level == 100 && $course->semester == 2)
                                            <?php 

                                                //Calculate the grade
                                                $score = $course->total_marks;
                                                //dd($score);
                                                switch ($weight = $score) 
                                                {
                                                    case $score >= 80 || $score == 100:
                                                        $weight = 4.0;
                                                        break;
                                                    case $score >= 75:
                                                        $weight =  3.5;
                                                        break;
                                                    case $score >= 70:
                                                        $weight =  3.0;
                                                        break;
                                                    case $score >= 65:
                                                        $weight =  2.5;
                                                        break;
                                                    case $score >= 60:
                                                        $weight =  2.0;
                                                        break;
                                                    case $score >= 55:
                                                        $weight =  1.5;
                                                        break;
                                                    case $score >= 50:
                                                        $weight =  1.0;
                                                        break;
                                                    case $score < 49 || $score == 0:
                                                        $weight =  0;
                                                        break;
                                                }
                                            ?>
                                            <tr class="record">
                                                <td>{{ $course->course_code }}</td>
                                                <td>{{ $course->course_title }}</td>
                                                <td class="sem1 creditHour" id="creditHour">
                                                    <?php
                                                        $credithour = $course->credit_hours;
                                                        $totalcdthr += $credithour;
                                                        echo $credithour;
                                                    ?>
                                                </td>
                                                <td>
                                                    @php
                                                        //Calculate the grade
                                                        $score = $course->total_marks;
                                                        switch ($score) {
                                                            case $score >=80 || $score==100:
                                                                echo "A";
                                                                break;
                                                            case $score >=75:
                                                                echo "B+";
                                                                break;
                                                            case $score >=70:
                                                                echo "B";
                                                                break;
                                                            case $score >=65:
                                                                echo "C+";
                                                                break;
                                                            case $score >=60:
                                                                echo "C";
                                                                break;
                                                            case $score >=55:
                                                                echo "D+";
                                                                break;
                                                            case $score >=50:
                                                                echo "D";
                                                                break;
                                                            case $score <49 || $score==0:
                                                                echo "E";
                                                                break;
                                                        }
                                                    @endphp
                                                </td>
                                                
                                                <td class="weight" id="weight">
                                                    @php
                                                        echo $weight;
                                                    @endphp
                                                </td>
                                                <td class="" id="gp-{{ $course->course_code }}" >
                                                @php
                                                    $gradepoint = $weight * $course->credit_hours;
                                                    $totalgp += $gradepoint;
                                                    echo $gradepoint;
                                                @endphp
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td><strong>Total Credit Hours:</strong></td>
                                        <td><strong class="totalsem1">
                                            @php
                                                echo $totalcdthr;
                                            @endphp    
                                        </strong></td>
                                        <td></td>
                                        <td><strong>Total Grade Point:</strong></td>
                                        <td><strong class="totalgpa"> 
                                            @php
                                                echo $totalgp;
                                            @endphp 
                                        </strong></td>
                                    </tr>
                                </tbody>
                            </table>
                                @php
                                    //$semestergpa = $totalgp/$totalcdthr;
                                    //echo "Semseter GPA: ". $semestergpa;
                                @endphp
                            <br>
                            <hr>
                            <br>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <!-- Level 200 Scores -->
                        <div class="table-responsive">
                            <h5>Level 200 - Semester 1</h5>
                            <table class="table table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <th>Course Code</th>
                                    <th>Course Title</th>
                                    <th>Credit Hours</th>
                                    <th>Grade</th>
                                    <th>Weight</th>
                                    <th>Grade Point</th>
                                </thead>
                                <tbody>
                                    @foreach ($trans as $course)
                                        @if ($course->level == 200 && $course->semester == 1)
                                            <tr>
                                                <td>{{ $course->course_code }}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td><strong>Total Credit Hours:</strong></td>
                                        <td><strong></strong></td>
                                        <td></td>
                                        <td><strong>Total Grade Point:</strong></td>
                                        <td><strong></strong></td>
                                    </tr>
                                </tbody>
                            </table>

                            <h5>Level 200 - Semester 2</h5>
                            <table class="table table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <th>Course Code</th>
                                    <th>Course Title</th>
                                    <th>Credit Hours</th>
                                    <th>Grade</th>
                                    <th>Weight</th>
                                    <th>Grade Point</th>
                                </thead>
                                <tbody>
                                    @foreach ($trans as $course)
                                        @if ($course->level == 200 && $course->semester == 2)
                                            <tr>
                                                <td>{{ $course->course_code }}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td><strong>Total Credit Hours:</strong></td>
                                        <td><strong></strong></td>
                                        <td></td>
                                        <td><strong>Total Grade Point:</strong></td>
                                        <td><strong></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="">
                            <img class="col-md-4 offset-md-4" src="{{asset('img/school-stamped.png')}}" alt="IMC Logo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        $(document).ready(function(){
            //Calculating Total Credit Hour
            /* var sem1 = 0
            $(".sem1").each(function(){
                sem1 += parseFloat($(this).text());
            });
            //alert(sem1);
            var sem1total = $(".totalsem1");
            sem1total.text(sem1); */


            //Calculating Total Grade Point
            /* var gpa = 0
            $(".gradepoint").each(function(){
                //gpa += parseFloat($(this).text());
            });
            var gpatotal = $(".totalgpa");
            gpatotal.text(gpa); */

            //Calculating Gradpoint
            /* $('.record').each(function(){
                var creditHour = parseFloat($(this).find("#creditHour").text());
                var weight = parseFloat($(this).find("#weight").text());
                var result = creditHour * weight;
                var gradepoint = $(this).find(".gradepoint").text(result);
            }); */
        });
        
    </script>
</body>
</html>