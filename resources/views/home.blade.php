@extends('layouts.app')

@section('title', 'Home - Teddy Portfolio')

@section('content')

@php
$formats = [
    'red-dot' => [
        'lang' => 'C#',
        'code' => "class Program {\n    static void Main(string[] args) {\n        var coder = new Coder {\n            Name = \"Adeyneous T Kpoto\",\n            Skills = new[] { \"Frontend\", \"Backend\", \"cloud\", \"Data Analysis\" },\n            HardWorker = true,\n            QuickLearner = true,\n            ProblemSolver = true\n        };\n        Console.WriteLine(coder.Hireable());\n    }\n}"
    ],
    'green-dot' => [
        'lang' => 'Python',
        'code' => "class Coder:\n    def hireable(self):\n        return self.hard_worker and self.problem_solver and len(self.skills) >= 5\n\ncoder = Coder(\n    name=\"Adeyneous T Kpoto\",\n    skills=[\"Frontend\", \"Backend\", \"cloud\", \"Data Analysis\"],\n    hard_worker=True,\n    quick_learner=True,\n    problem_solver=True\n)\nprint(coder.hireable())"
    ],
    'yellow-dot' => [
        'lang' => 'Java',
        'code' => "public class Main {\n    public static void main(String[] args) {\n        Coder coder = new Coder();\n        coder.name = \"Adeyneous T Kpoto\";\n        coder.skills = new String[]{ \"Frontend\", \"Backend\", \"cloud\", \"Data Analysis\" };\n        coder.hardWorker = true;\n        coder.quickLearner = true;\n        coder.problemSolver = true;\n        System.out.println(coder.isHireable());\n    }\n}"
    ],
    'purple-dot' => [
        'lang' => 'Kotlin',
        'code' => "data class Coder(val name: String, val skills: Array<String>, val hardWorker: Boolean, val quickLearner: Boolean, val problemSolver: Boolean) {\n    fun isHireable() = hardWorker && problemSolver && skills.size >= 5\n}\n\nfun main() {\n    val coder = Coder(\n        name = \"Adeyneous T Kpoto\",\n        skills = arrayOf(\"Frontend\", \"Backend\", \"cloud\", \"Data Analysis\"),\n        hardWorker = true,\n        quickLearner = true,\n        problemSolver = true\n    )\n    println(coder.isHireable())\n}"
    ],
];
@endphp

<div class="hm-page">

    {{-- ── LEFT: greeting + buttons + stats ── --}}
    <div class="hm-left">

        <div class="hm-badge">Available for opportunities</div>

        <h1 class="hm-greeting">
            Hello,<br>
            I'm <span class="hm-name">Adeyneous T Kpoto</span>
        </h1>

        <p class="hm-sub">
            A Software Developer and a Data Engineer,<br>
            with skills in
            <span class="hm-dynamic">
                <span id="dynamic-text"></span><span class="hm-cursor">|</span>
            </span>
        </p>

        <form action="{{ route('download.resume') }}" method="post" class="hm-btn-row">
            @csrf
            <button type="submit" class="hm-btn-primary">
                Download Resume
            </button>
            <button type="button" class="hm-btn-outline"
                    onclick="redirectToContact('{{ route('contact.show') }}');">
                Contact Me
            </button>
        </form>

        {{-- Live GitHub stat chips ── pulled by Home.js --}}
        <div class="hm-stats">
            <div class="hm-stat">
                <span class="hm-stat-n" id="hm-repos">–</span>
                <span class="hm-stat-l">Repos</span>
            </div>
            <div class="hm-stat">
                <span class="hm-stat-n">5+</span>
                <span class="hm-stat-l">Projects</span>
            </div>
            <div class="hm-stat">
                <span class="hm-stat-n">2+</span>
                <span class="hm-stat-l">Yrs Exp</span>
            </div>
            <div class="hm-stat">
                <span class="hm-stat-n" id="hm-followers">–</span>
                <span class="hm-stat-l">Followers</span>
            </div>
        </div>

    </div>

    {{-- ── RIGHT: code block (existing logic preserved) ── --}}
    <div class="hm-code-wrap">

        {{-- Title bar with language label + colour dots --}}
        <div class="hm-code-bar">
            <span class="hm-code-lang" id="hm-lang-label">C#</span>
            <div class="hm-dot-row">
                @foreach($formats as $key => $data)
                    <span class="hm-dot {{ $key }}"
                          data-id="{{ $key }}"
                          data-lang="{{ $data['lang'] }}"
                          title="{{ $data['lang'] }}"></span>
                @endforeach
            </div>
        </div>

        {{-- Code output (same id as before so Home.js works unchanged) --}}
        <pre id="formatted-code-text" class="hm-code-body"></pre>

        {{-- Hidden data store (same structure as before) --}}
        <div id="format-data" style="display:none;">
            @foreach($formats as $key => $data)
                <div data-id="{{ $key }}"
                     data-description="{{ e($data['code']) }}"
                     data-lang="{{ $data['lang'] }}"></div>
            @endforeach
        </div>

    </div>

</div>

@endsection

@section('scripts')
<script src="{{ asset('Scripts/Home.js') }}"></script>
@endsection
