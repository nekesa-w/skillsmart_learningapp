<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>

<?php foreach ($courses as $course) { ?>

    <!-- Team Start -->
    <div class="container-fluid pt-5">
        <div class="container">

            <div class="text-center pb-2">
                <p class="section-title px-5">
                    <span class="px-2"><?= $course['dimension'] ?> </span>
                </p>
                <h1 class="mb-4"><?= $course['course_title'] ?> </h1>
                <p><?= $course['desc'] ?> </p>
            </div>

            <!--
            <p id="demo"></p>

            <svg xmlns="http://www.w3.org/2000/svg" id="mySVG" viewBox="0 0 100 80">
                <path id="myPath" d="M10,10H70A10,10 0 0 1 70,30H20A10,10 0 0 0 20,50H70A10,10 0 0 1 70,70H20" />
            </svg>
            -->
        </div>
    </div>


    <!-- Team End -->
    <!--
    <script>
        var courses = <?php echo json_encode($courses); ?>;
        console.log(courses);

        for (var i = 0; i < courses.length; i++) {
            var course = courses[i];
            var points = course.number_of_levels;

            var listItem = document.createElement('li');
            listItem.textContent = points;

            //console.log('Number of Levels:', points);
            document.getElementById("demo").appendChild(listItem);
        }


        /**
        * var circleCount = >
        var path = document.getElementById("myPath");
        var svg = document.getElementById("mySVG");
        var pathLength = path.getTotalLength();
        var interval = pathLength / (circleCount + 1);

        // Clear previously generated circles
        var oldCircles = document.getElementsByClassName("generated-circle");
        while (oldCircles.length > 0) {
        oldCircles[0].parentNode.removeChild(oldCircles[0]);
        }

        // Generate new circles along the path
        for (let i = 1; i <= circleCount; i++) { var distance=i * interval; var point=path.getPointAtLength(distance); var circle=document.createElementNS("http://www.w3.org/2000/svg", "circle" ); circle.setAttribute("class", "generated-circle" ); circle.setAttribute("cx", point.x); circle.setAttribute("cy", point.y); circle.setAttribute("r", "8" ); svg.appendChild(circle); } **/
    </script>
        -->

<?php } ?>

<?= $this->endSection() ?>