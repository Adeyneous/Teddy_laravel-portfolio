@extends('layouts.app')

@section('title', 'Home - Teddy Portfolio')

@section('content')
<div class="content-container">
    <div class="welcome-message-container">
        <p class="welcome-message">
            <span style="font-size: 4.5rem">Hello,</span><br>
            <span style="font-size: 2rem; color: white;">I'm Adeyneous T Kpoto</span><br>
            <span style="color: purple">A Software Developer and a Data Engineer,</span><br>
            <span style="color: white"> with skills in</span>
            <span style="color: purple"><span id="dynamic-text"></span><span class="cursor">|</span></span>
        </p>

        <form action="{{ route('download.resume') }}" method="post">
            @csrf
            <button type="submit" class="download-button" name="download_resume">Download Resume</button>

            <button type="button"
                    class="button"
                    onclick="redirectToContact('{{ route('contact.show') }}');">
                Contact Me
            </button>
        </form>
    </div>

    <div class="coder-profile">
        <pre id="formatted-code-text"></pre>

        <div class="dot-container">
            <span class="dot red-dot" data-id="red-dot"></span>
            <span class="dot green-dot" data-id="green-dot"></span>
            <span class="dot yellow-dot" data-id="yellow-dot"></span>
            <span class="dot purple-dot" data-id="purple-dot"></span>
        </div>

        @php
        $formats = [
            'red-dot' => "class Program {\n    static void Main(string[] args) {\n        var coder = new Coder {\n            Name = \"Adeyneous T Kpoto\",\n            Skills = new[] { \"Frontend\", \"Backend\", \"cloud\", \"Data Analysis\" },\n            HardWorker = true,\n            QuickLearner = true,\n            ProblemSolver = true\n        };\n        Console.WriteLine(coder.Hireable());\n    }\n}",
            'green-dot' => "class Coder:\n    def hireable(self):\n        return self.hard_worker and self.problem_solver and len(self.skills) >= 5\n\ncoder = Coder(\n    name=\"Adeyneous T Kpoto\",\n    skills=[\"Frontend\", \"Backend\", \"cloud\", \"Data Analysis\"],\n    hard_worker=True,\n    quick_learner=True,\n    problem_solver=True\n)\nprint(coder.hireable())",
            'yellow-dot' => "public class Main {\n    public static void main(String[] args) {\n        Coder coder = new Coder();\n        coder.name = \"Adeyneous T Kpoto\";\n        coder.skills = new String[]{ \"Frontend\", \"Backend\", \"cloud\", \"Data Analysis\" };\n        coder.hardWorker = true;\n        coder.quickLearner = true;\n        coder.problemSolver = true;\n        System.out.println(coder.isHireable());\n    }\n}",
            'purple-dot' => "data class Coder(val name: String, val skills: Array<String>, val hardWorker: Boolean, val quickLearner: Boolean, val problemSolver: Boolean) {\n    fun isHireable() = hardWorker && problemSolver && skills.size >= 5\n}\n\nfun main() {\n    val coder = Coder(\n        name = \"Adeyneous T Kpoto\",\n        skills = arrayOf(\"Frontend\", \"Backend\", \"cloud\", \"Data Analysis\"),\n        hardWorker = true,\n        quickLearner = true,\n        problemSolver = true\n    )\n    println(coder.isHireable())\n}"
        ];
        @endphp

        <div id="format-data" style="display:none;">
            @foreach($formats as $key => $value)
                <div data-id="{{ $key }}" data-description="{{ e($value) }}"></div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('Scripts/Home.js') }}"></script>
@endsection

