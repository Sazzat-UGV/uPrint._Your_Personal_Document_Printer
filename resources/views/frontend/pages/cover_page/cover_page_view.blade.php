<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>assignment-cover-page</title>

    <style>
      @font-face {
        font-family: "times_new_roman_cyr";
        src: url("times_new_roman-webfont.woff2") format("woff2"),
          url("times_new_roman-webfont.woff") format("woff");
        font-weight: normal;
        font-style: normal;
      }
      * {
        margin: 0;
        padding: 0;
      }

      /* set layout  */
      .main_container {
        width: 100%;
        height: auto;
        margin: 0 auto;
        background-color: white;
        padding-bottom: 40px;
      }
      .container {
        padding-left: 50px;
        padding-right: 50px;
        padding-top: 30px;
        margin: 0 auto;
      }

      /* Header section  */
      .header_logo {
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .header_logo img {
        display: block;
        width: 150px;
        margin-left: 40%;
        height: auto;
        border-radius: 2px;
      }
      .header_title h2 {
        font-size: 20px;
        font-weight: 800;
        font-family: "Times New Roman", Times, serif;
        color: red;
        text-align: center;
        margin-bottom: 0;
        margin-top: 20px;
      }
      .header_title h3 {
        font-size: 20px;
        color: #1f4e79;
        font-weight: 600;
        text-align: center;
        margin-top: 10px;
      }
      .header_title p {
        font-size: 20px;
        font-family: Times New Roman;
        font-style: italic;
        color: #371f79;
        font-weight: 700;
        margin-top: 20px;
        text-align: center;
      }

      /* course title course code info  */

      .course_info {
        margin-bottom: 50px !important;
        width: 80%;
        margin: 0 auto;
        border: 1px solid black;
        border-radius: 5px;
        padding: 20px;
        margin-top: 40px;
      }
      span {
        font-weight: 600;
      }
      .course_info p {
        font-size: 16px;
        font-weight: 400;
        padding: 6px;
      }
      /* submitted information sections  */
      .submit-info-container {
        width: 80%;
        margin: 0 auto;
        justify-content: center;
        display: flex;
        flex-wrap: wrap;
      }
      .submit-info-container_item {
        flex: 1;
        width: 100%;
      }
      .submitted_by {
        margin-top: 35px;
        margin-left: 200px;
      }
      .submitted_h {
        font-size: 20px;
        font-weight: 800px;
        text-decoration: underline;
        margin-bottom: 25px;
      }
      .submitted_p {
        margin-top: 10px;
        font-size: 18px;
      }
      /* submittion date */
      .submitted_date {
        margin-top: 70px;
      }
      .submitted_date p {
        width: 80%;
        margin: 0 auto;
        font-size: 18px;
        font-weight: 600;
      }
      .generate_develper {
        font-size: 12px;
        font-weight: 600;
        margin-top: 40px;
        text-align: right;
        color: rgb(66, 66, 66);
      }
    </style>
  </head>
  <body>
    <div class="main_container">
      <div class="container">
        <div class="header_logo">
          <img src="{{ public_path('assets/frontend/cover_page/UGV_Logo.png') }}" alt="versity-logo" />
        </div>
        <div class="header_title">
          <h2>UNIVERSITY OF GLOBAL VILLAGE (UGV), BARISHAL</h2>
          <h3>Dept. of @foreach ($student_details as $student_detail)
            {{ $student_detail->department->full_name }}
          @endforeach</h3>
          @if ($assignment_topic)
          <p style="color: black">Assignment For</p>
          <p>{{ $assignment_topic }}</p>
          @else
          <p style="padding-top: 20px"></p>
          @endif
        </div>

        <div class="course_info">
            @foreach ($subjects as $subject)

          <p><span>Course Code:</span> {{ $subject->subject_code }}</p>
          <p>
            <span>Course Title:</span> {{ $subject->subject_name }}
        </p>
        @endforeach
        </div>

        <div class="submit-info-container">
          <div class=" submit-info-container_item">
            <h3 class="submitted_h">Submitted To:</h3>
            @foreach ($teachers as $teacher)
            <div class="submitted_p">
              <p>{{ $teacher->teacher_name }}</p>
              <p style="font-size: 16px">{{ $teacher->teacher_designation }}</p>
              <p>Dept of {{ $teacher->department->full_name }}</p>
              <p>University of Global Village (UGV), Barishal</p>
            </div>
            @endforeach
          </div>

          <div class="submitted_by submit-info-container_item">
            <h3 class="submitted_h">Submitted by:</h3>
            @foreach ($student_details as $info)
            <div class="submitted_p">
                <p><span>Name:</span> {{ $info->name }}</p>
                <p><span>ID:</span> {{ $info->student_id }}</p>
                <p><span>Department:</span> {{ $info->department->full_name }}</p>
                @endforeach
                <p><span>Semester:</span> @foreach ($student_semester as $semester)
                    {{ $semester->semester_name }}
                @endforeach</p>
            </div>

          </div>
        </div>

        <div class="submitted_date">
          <p>Date of Submission: {{ $newDate }} </p>
        </div>

        <div class="generate_develper">
          <p>@Generated by uPrint</p>
        </div>
      </div>
    </div>
  </body>
</html>
