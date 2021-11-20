<?php

namespace Database\Seeders;

use App\Models\CPQuestion;
use Illuminate\Database\Seeder;

class CodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            [
                "name" => "Who Am I Calling",
                "expected_output" => "Q2FzZSAjMTogNA==",
                "input" => "MQo1CjIwMCAzMDAKMTAwMCA5MAozMDAgMzAxCjMwMSA0CjUgMTAKMzAw",
                "html" => $this->htmls()[0]
            ],
            [
                "name" => "Can Meet",
                "expected_output" => "Q2FzZSAjMTogWUVTCkNhc2UgIzI6IFlFUwpDYXNlICMzOiBOTw==",
                "input" => "Mwo1IDUKIyMjIyMKI1MgICMKIyAgICMKIyAgRSMKIyMjIyMKMTAgMTAKIyMjIyMjIyMjIwojIyAg
ICAgIEUjCiNTIyAgICAgICMKIyAgIyAgICAgIwojICAgIyAgICAjCiMgICAgIyAgICMKIyAgICAg
IyAgIwojICAgICAgIyAjCiMgICAgICAgICMKIyMjIyMjIyMjIwoxMCAxMAojIyMjIyMjIyMjCiMj
ICAgICAgRSMKI1MjICAgICAgIwojICAjICAgICAjCiMgICAjICAgICMKIyAgICAjICAgIwojICAg
ICAjICAjCiMgICAgICAjICMKIyAgICAgICAjIwojIyMjIyMjIyMj",
                "html" => $this->htmls()[1]
            ],
            [
                "name" => "Prime Numbers",
                "expected_output" => "Q2FzZSAjMTogMiAzIDUgNwpDYXNlICMyOiA1IDc=",
                "input" => "MgoxIDEwCjUgMTA=",
                "html" => $this->htmls()[2]
            ]
        ];
        foreach ($questions as $i){
            $data = new CPQuestion();
            $data->name = $i["name"];
            $data->expected_output = $i["expected_output"];
            $data->input = $i["input"];
            $data->html = $i["html"];
            $data->save();
        }
    }

    public function htmls()
    {
        return [
            `<h1 id="who-am-i-calling">Who Am I Calling</h1>
<h2 id="introduction">Introduction</h2>
<p>A big company usually has a phone with lots of extensions. Sometimes, when we call them, they will redirect us to another extensions. And now, we want to know which extension are we calling</p>
<h2 id="input">Input</h2>
<p>The input will start with an integer <strong><em>t</em></strong> and then each <strong><em>t</em></strong> lines, the input will be an integer <strong><em>n</em></strong> determining how many redirections. for each <strong><em>n</em></strong> lines, there will be <strong><em>x</em></strong> and <strong><em>y</em></strong> determining the source and the redirection of <strong><em>x</em></strong>. The input is followed by and integer <strong><em>z</em></strong> determining where we call from.</p>
<h2 id="output">Output</h2>
<p>Print &quot;Case #<strong><em>i</em></strong>: &quot; where <strong><em>i</em></strong> determines the current case and followed by the last redirected number</p>
<h2 id="test-case">Test Case</h2>
<p>Input</p>
<pre>
1
5
200 300
1000 90
300 301
301 4
5 10
300
</pre>

<p>Output</p>
<pre>
Case #1: 4
</pre>
`,
            `<h1 id="can-meet-">Can Meet?</h1>
<h2 id="introduction">Introduction</h2>
<p><img src="image/maze.png" alt="Maze"></p>
<p>A maze is a path or collection of paths, typically from an entrance to a goal (Wikipedia). Tutu wants to check if a start point can reach the end point. But he is too lazy to use his eyes, so decides to make a program to solve the problem.</p>
<h2 id="input">Input</h2>
<p>The first input will be <em>T</em> meaning the total test case, and the next <em>T</em> lines, the input will be <em>W</em> and <em>H</em> meaning the width and the height of the maze including the walls and then it will be followed by a <em>W</em>X<em>H</em> map. &#39;#&#39; meaning an obstacle, &#39; &#39; meaning a path, &#39;S&#39; meaning the start point, and &#39;E&#39; meaning the end point. The path is UP or DOWN or LEFT or RIGHT only.</p>
<h2 id="output">Output</h2>
<p>For each test cases, the output will be &quot;Case #<em>i</em>: &quot; (<em>i</em> is the current test case) and then follow by &quot;YES&quot; if start point can reach end point otherwise print &quot;NO&quot;</p>
<h2 id="test-case">Test Case</h2>
<h3 id="input">Input</h3>
<pre>
3
5 5
#####
#S  #
#   #
#  E#
#####
10 10
##########
##      E#
#S#      #
#  #     #
#   #    #
#    #   #
#     #  #
#      # #
#        #
##########
10 10
##########
##      E#
#S#      #
#  #     #
#   #    #
#    #   #
#     #  #
#      # #
#       ##
##########
</pre>

<p>|</p>
<h3 id="output">Output</h3>
<pre>
Case #1: YES
Case #2: YES
Case #3: NO
</pre>
`,
            `<h1 id="prime-numbers">Prime Numbers</h1>
<h2 id="introduction">Introduction</h2>
<p>One day, Tata told Tutu a story about prime number and we don&#39;t know what Tata told him. A few days later, Tutu told you the story but you understand nothing. At school, Tutu has learnt about prime numbers between 1 and 100 (I believe, you had learnt it before at elementary school). But Tutu wants to know more prime numbers. Instead of calculate in on paper, it is better for you to make a program to know the prime numbers between 2 numbers.</p>
<h2 id="inputs">Inputs</h2>
<p>The input will be <em>t</em> as the test case numbers and followed by <em>t</em> lines which require 2 inputs which are <em>a</em> as the start number and <em>b</em> as the end number</p>
<h2 id="outputs">Outputs</h2>
<p>Output all prime numbers between <em>a</em> and <em>b</em> in a line, but avoid a trailing space</p>
<h2 id="constraint">Constraint</h2>
<p>1 &lt;= <em>t</em> &lt;= 1000<br>
1 &lt;= <em>a</em> &lt;= 10000<br>
a &lt;= <em>b</em> &lt;= 10000<br></p>
<h2 id="test-case">Test Case</h2>
<table>
<thead>
<tr>
<th>Input</th>
<th>Output</th>
</tr>
</thead>
<tbody>
<tr>
<td>2<br>1 10<br>5 10<br></td>
<td>Case #1: 2 3 5 7<br>Case #2: 5 7<br></td>
</tr>
</tbody>
</table>
`
        ];
    }
}
