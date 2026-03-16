@extends('layouts.app')

@section('title', 'Skills - Teddy Portfolio')
@section('bodyClass', 'skills-page')

@section('content')
@php
$skills = [
    'Frontend' => [
        'percentage' => 87,
        'description' => 'With three years of front-end development experience, my journey began at Hennepin Tech, where I delved into the intricacies of HTML, CSS, and JavaScript. These foundational classes provided me with the practical skills needed to create responsive and user-friendly web interfaces. My curiosity didnt stop at the classroom door; driven to expand my expertise, I independently pursued TypeScript. This self-directed learning enhanced my JavaScript knowledge, allowing me to build more robust and scalable applications. My educational and self-taught experiences have equipped me with a solid skill set to tackle diverse front-end challenges.'
    ],
    'Backend' => [
        'percentage' => 74,
        'description' => 'My backend development journey began at Hennepin Tech, where I started with Python basics, advancing to more complex Python courses. The program covered practical projects using JavaScript, MySQL, T-SQL, and SQL Server, which laid a solid foundation in data management and web application development. My eagerness to learn pushed me to independently master additional technologies such as PHP, Node.js, and MongoDB, alongside other data stores like Redis, Apache Cassandra, HBase, and DynamoDB, enhancing my ability to manage diverse database environments and tackle big data challenges.'
    ],
    'Machine Learning' => [
        'percentage' => 77,
        'description' => 'My journey with frameworks commenced at Hennepin Tech, where I was introduced to the powerful and versatile .NET framework. This structured environment honed my ability to build robust and scalable applications. In my pursuit of expanding my technical toolkit, I independently embraced React, a modern JavaScript library for building user interfaces. This self-initiated learning allowed me to design dynamic and responsive web components, further enriching my front-end development skills and enabling me to create seamless user experiences.'
    ],
    'Data Analytics' => [
        'percentage' => 70,
        'description' => 'After four semesters at Hennepin Technical College, Im enthusiastic about furthering my education at Metropolitan State University in St. Paul, Minnesota. The summer following my second semester was a turning point when I began exploring machine learning. My aim is to pursue a Masters in Data Science. With a solid foundation in Python and JavaScript, Im eager to delve deeper into the remarkable capabilities these skills unlock. What excites me most about machine learning is its power to sift through vast datasets and unravel intricate problems, offering solutions that can transform industries and improve lives.'
    ],
    'Mobile Development' => [
        'percentage' => 74,
        'description' => 'After a semester of mobile app development, my eagerness to deepen my understanding in this field led me to purchase a comprehensive book on the subject. This book has been instrumental in enhancing my skills, particularly in Kotlin, a language I had been aspiring to learn for quite some time. The knowledge I have gained has been incredibly fulfilling, and I am very pleased with the progress I have made. The journey into mobile app development, especially with Kotlin, has opened new horizons for me, and I am excited about the possibilities this knowledge unlocks.'
    ],
];

$logos = [
    ['image' => 'Azure.svg', 'name' => 'Azure'],
    ['image' => 'MongoDB.svg', 'name' => 'MongoDB'],
    ['image' => 'sql.svg', 'name' => 'SQL'],
    ['image' => 'AWS.svg', 'name' => 'AWS'],
    ['image' => 'bootstrap.svg', 'name' => 'Bootstrap'],
    ['image' => 'c.svg', 'name' => 'C#'],
    ['image' => 'css.svg', 'name' => 'CSS'],
    ['image' => 'html.svg', 'name' => 'HTML'],
    ['image' => 'docker.svg', 'name' => 'Docker'],
    ['image' => 'google.svg', 'name' => 'Google'],
    ['image' => 'hadoop.svg', 'name' => 'Hadoop'],
    ['image' => 'python.svg', 'name' => 'Python'],
    ['image' => 'java.svg', 'name' => 'Java'],
    ['image' => 'javascript.svg', 'name' => 'JavaScript'],
    ['image' => 'kotlin.svg', 'name' => 'Kotlin'],
    ['image' => 'react.svg', 'name' => 'React'],
    ['image' => 'redhat.svg', 'name' => 'RedHat'],
    ['image' => 'typescript.svg', 'name' => 'TypeScript'],
    ['image' => 'PostgreSQL.svg', 'name' => 'PostgreSQL'],
    ['image' => 'nodejs.svg', 'name' => 'NodeJS'],
    ['image' => 'Azure.svg', 'name' => 'Azure'],
    ['image' => 'MongoDB.svg', 'name' => 'MongoDB'],
    ['image' => 'sql.svg', 'name' => 'SQL'],
    ['image' => 'AWS.svg', 'name' => 'AWS'],
    ['image' => 'bootstrap.svg', 'name' => 'Bootstrap'],
    ['image' => 'c.svg', 'name' => 'C#'],
    ['image' => 'css.svg', 'name' => 'CSS'],
    ['image' => 'html.svg', 'name' => 'HTML'],
    ['image' => 'docker.svg', 'name' => 'Docker'],
    ['image' => 'google.svg', 'name' => 'Google'],
    ['image' => 'hadoop.svg', 'name' => 'Hadoop'],
    ['image' => 'python.svg', 'name' => 'Python'],
    ['image' => 'java.svg', 'name' => 'Java'],
    ['image' => 'javascript.svg', 'name' => 'JavaScript'],
    ['image' => 'kotlin.svg', 'name' => 'Kotlin'],
    ['image' => 'react.svg', 'name' => 'React'],
    ['image' => 'redhat.svg', 'name' => 'RedHat'],
    ['image' => 'typescript.svg', 'name' => 'TypeScript'],
    ['image' => 'PostgreSQL.svg', 'name' => 'PostgreSQL'],
    ['image' => 'nodejs.svg', 'name' => 'NodeJS'],
];
@endphp

<div class="skills-container">
    @foreach($skills as $skill => $data)
        @php
            $radius = 50;
            $circumference = 2 * pi() * $radius;
            $fullOffset = $circumference;
        @endphp
        <div class="skill" data-skill-percentage="{{ $data['percentage'] }}" data-skill-desc="{{ $data['description'] }}" data-skill-name="{{ $skill }}">
            <svg width="120" height="120" viewBox="0 0 120 120">
                <circle cx="60" cy="60" r="{{ $radius }}" fill="none" class="circle-background"/>
                <circle cx="60" cy="60" r="{{ $radius }}" fill="none" class="circle-progress" stroke-dasharray="{{ $circumference }}" stroke-dashoffset="{{ $fullOffset }}"/>
                <text x="50%" y="50%" class="circle-text" dy=".3em" text-anchor="middle">{{ $data['percentage'] }}%</text>
            </svg>
            <div class="skill-name">{{ $skill }}</div>
        </div>
    @endforeach
</div>

<p id="skill-description"></p>

<div class="logo-wrapper">
    <div class="logo-container" id="logo">
        @foreach($logos as $logo)
            <div class="logo">
                <img src="{{ asset('Img/' . $logo['image']) }}" alt="{{ $logo['name'] }}">
                <span class="logo-label">{{ $logo['name'] }}</span>
            </div>
        @endforeach
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('Scripts/skills.js') }}"></script>
@endsection
