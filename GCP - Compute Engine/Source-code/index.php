<?php
// PHP Variables
$name = "John Josua";
$title = "Cloud Engineer";
$email = "johnjosua@gmail.com";
$phone = "+1 234 567 890";
$address = "Manila";
$summary = "Experienced Cloud Engineer with a demonstrated history of working in the information technology and services industry.";

$experience = [
    [
        'position' => 'Cloud Engineer',
        'company' => 'Cloud Company',
        'years' => '2019 - 2021',
        'description' => 'Worked on deploying and managing cloud environments, focusing on GCP.'
    ]
];

$education = [
    [
        'degree' => 'Bachelor of Science in Information Technology',
        'institution' => 'Pamantasan ng Lungsod ng Valenzuela',
        'years' => '2014 - 2018'
    ]
];

$skills = [
    'Google Cloud Platform',
    'Cloud Administration',
    'Kubernetes',
    'Docker',
    'Python',
    'PHP',
    'Linux Administration',
    'Leadership'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My CV</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
        }
        .section {
            margin-bottom: 20px;
        }
        h2 {
            color: #007BFF;
        }
        .contact {
            list-style: none;
            padding: 0;
        }
        .contact li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1><?php echo $name; ?></h1>
        <p><?php echo $title; ?></p>
    </div>

    <div class="section">
        <h2>Contact Information</h2>
        <ul class="contact">
            <li>Email: <?php echo $email; ?></li>
            <li>Phone: <?php echo $phone; ?></li>
            <li>Address: <?php echo $address; ?></li>
        </ul>
    </div>

    <div class="section">
        <h2>Professional Summary</h2>
        <p><?php echo $summary; ?></p>
    </div>

    <div class="section">
        <h2>Work Experience</h2>
        <ul>
            <?php foreach($experience as $job): ?>
                <li>
                    <strong><?php echo $job['position']; ?></strong><br>
                    <?php echo $job['company']; ?> - <?php echo $job['years']; ?><br>
                    <p><?php echo $job['description']; ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="section">
        <h2>Education</h2>
        <ul>
            <?php foreach($education as $edu): ?>
                <li>
                    <strong><?php echo $edu['degree']; ?></strong><br>
                    <?php echo $edu['institution']; ?> - <?php echo $edu['years']; ?><br>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="section">
        <h2>Skills</h2>
        <ul>
            <?php foreach($skills as $skill): ?>
                <li><?php echo $skill; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

</body>
</html>
