@extends('layouts.app')

@section('title', 'About - Teddy Portfolio')

@section('content')
<div class="about-container">
    <div class="about-picture-box">
        <img src="{{ asset('Img/IMG_4998.jpg') }}" alt="Your Picture" />
    </div>

    <div class="about-message-container">
        <p class="about-message">
            <span style="font-size: 2.5rem">Hello,</span><br>
            <span style="font-size: 1.2rem; color: white;">Welcome! My name is Adeyneous Teddy Kpoto, a dedicated IT professional specializing in Database Management and Software Development. I am currently pursuing a Bachelor's degree in Computer Science at Metro State University. My skill set includes SQL, Python, C#, Kotlin, and Java, and I have gained proficient knowledge in database systems like SQL Server and MongoDB. I am also quite knowledgeable about cloud platforms like AWS and Azure.

My journey began at Hennepin Technical College, where I earned an Associate's degree in SQL Server Software Development, setting a solid foundation for my technical expertise. In the tech trenches, I've contributed to numerous projects, showcasing my ability to not only manage complex databases but also develop robust software solutions. I take pride in my ability to translate intricate data into actionable insights and my knack for writing clean, efficient code.

My drive for continuous learning led me to independently explore React, Node.js, PHP, and TypeScript, further expanding my development toolkit. I am passionate about leveraging technology to solve problems and improve business outcomes. My goal is to join a forward-thinking company where I can contribute to challenging projects and grow as part of a dynamic team. I bring a mix of technical prowess, strategic thinking, and collaborative spirit, aiming to drive success in every database or software initiative I undertake.

I invite you to browse through my portfolio to see the breadth of my work and reach out if you're looking for a tech enthusiast who is ready to make a tangible impact.</span>
        </p>
    </div>
</div>
@endsection