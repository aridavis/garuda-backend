<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\JobStep;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idx = 0;
        foreach ($this->data() as $d){
            $x = new Job();
            $x->company_id = $d["company_id"];
            $x->name = $d["name"];
            $x->description = $d["description"];
            $x->category = $d["category"];
            $x->pay_range = $d["pay_range"];
            $x->country = $d["country"];
            $x->city = $d["city"];
            $x->open = $d["open"];
            $x->close = $d["close"];
            $x->save();

//            "CV Review", "Aptitude Test",  "HR Interview", "User Interview (Programming)", "User Interview"
            if($idx == 3){
                $a = 1;
                foreach ([1,2,3,4] as $i){
                    $j = new JobStep();
                    $j->job_id = $x->id;
                    $j->order = $a;
                    $j->step_id = $i;
                    $a++;
                    $j->meeting_type_id = $i == 4 ? 2 : 1;
                    $j->save();
                }
            } else {
                $a = 1;
                foreach ([1,2,3,5] as $i){
                    $j = new JobStep();
                    $j->job_id = $x->id;
                    $j->order = $a;
                    $j->step_id = $i;
                    $a++;
                    $j->meeting_type_id = $i < 3 ? null : $i == 4 ? 2 : 1;
                    $j->save();
                }
            }
            $idx++;
        }
    }

    public function data(){
        return [
            [
                "company_id" => 1,
                "name" => "Software Engineer (Tools Engineering)",
                "description" => "Accountabilities:\n - You will be involved in creating Frameworks and Tools that will boost productivity, security and performance in Tokopedia\n - Deeply engaged in the full development lifecycle designing, developing, testing, deploying, maintaining, monitoring, and improving the software.\n - Deploy code daily and use data to drive our decisions while delivering software and analytics to consumers and dealers.\n - Own your projects and collaborate with fellow engineers and product partners as you solve interesting problems\n - Write well-formatted modular code\n - Compile and integrate changes with the project\n - Implement unit tests and functional tests for their tasks\n - Convert given high-level software design to low-level software design\n - Use suitable data structures\n - Perform, debug and fix bugs, competency in 1 programming language\n\nRequirements:\n\n - Bachelor degree in Computer Science / Computer Engineering or equivalent work experience\n - 1+ years of software development experience (Fresh graduate is welcome)\n - Coding skill in Go, Java, or similar object-oriented languages\n - Experience in different databases. Relational (PostgreSQL or MySQL), NoSQL(Elasticsearch), and in memory database (REDIS)\n - Experience in building Front End/ Web User Interface using javascript\n - Passion for building customer value.\n - High familiarity with Linux environment\n - Good collaboration and communication skills.\n - Good attitude and able to receive critics and inputs properly\n - Able to withstood dynamics in workspace, both steady and fast changing pace environment\n - Excited to learn something new\n\nPreferred Qualifications:\n\n - Experiences with cloud platforms (Google Cloud Platform, AWS, Alibaba cloud)\n - Experiences with shell scripting and python\n - Experiences with ReactJS",
                "category" => "Software Engineer",
                "pay_range" => 0,
                "country" => "Indonesia",
                "city" => "Jakarta",
                "open" => "2021-08-08",
                "close" => "2022-02-01",
            ],
            [
                "company_id" => 1,
                "name" => "Senior Software Engineer (Engineering Productivity)",
                "description" => "Are you the type of person who loves to dive into a new technology stack? Do you view uncertainty as an opportunity to control your own destiny and to express your creativity? Do you love to work in a small and productive team and to collaborate with teams all around the world?\n\nWe are looking for an experienced Software Development Engineer in Test who will play a key role in Tokopedia's vision for an integrated experience for eCommerce users and partners. You will be part of a small engineering team pioneering new technology and user experience. You will set the quality bar for the team and be passionate about quality. You will drive the continuous effort to improve the product quality. You will design and develop automated suites of tests and help build a continuous delivery pipeline. When things change, you know how to roll with the punches. \n\n \nResponsibilities:\n\n- Lead/contribute to engineering efforts from design to implementation, solving complex technical challenges around developer and engineering productivity and velocity.\n- Closely coordinate with both Dev and Ops regarding testing practices and ensuring quality thresholds are met\n- Influence and drive quality across teams, disciplines, and the organisation\n- Participate in the development and continuous testing of web service applications via automation\n- Design, develop, improve and maintain test automation systems, tools and test scripts using best practices\n- Design and author test cases for unit, functional, performance, scalability, and durability testing (where applicable)\n- Oversee automated tests integration into the CI/CD Pipeline\n- Verify component, system integration and application level features and functionality to ensure our reliability, accuracy and performance reaches our standards for quality.\n- Review engineering technical design documents and requirements. Provide plan and strategy about how and where to build in testability\n- Analyze and decompose complex software systems and collaborate with cross-functional teams to influence design for testability.\n\nQualifications\n\n - 3-5 years of working experience in related field\n - Experience in one or more of the following: test automation, refactoring code, test-driven development, build infrastructure, optimizing software, debugging, building tools and testing frameworks \n - Demonstrated “Developer Mindset” with “Test Mentality”\n - Experience in test integration with CI/CD pipeline \n - Whitebox/Blackbox testing experience\n - Experience working in an Agile Development Environment\n - Experience in Manual Testing and Bug Triage\n - A computer science background or equivalent experience (programming styles, data structures, algorithms, etc.\n - Test Automation tool: Katalon, Appium and xCode\n - Programming Language: Go, Python, Java, JavaScript\n - Web Services: JSON, REST, RPC, XML, GQL, gRPC\n - Database: RDBMS, NoSQL, and Caching Technologies such as PostgreSQL, MySQL, Redis, and/or Apsara DB.\n - Continuous test, integration and deployment\n - Preferred experience in networking: protocols, distributed systems, layered architectures\n - Preferred experience in strong debugging skills: Ability to spot design flaws, race conditions and performance bottlenecks in complex architectures\n - Preferred experience in Mobile Application, OS and Web Browser (NodeJS) compatibility testing\n - Preferred experience in Cloud Platform: GCP, AWS, Alibaba Cloud\n - Preferred experience in Container: Docker/Kubernetes",
                "category" => "Software Engineer",
                "pay_range" => 0,
                "country" => "Indonesia",
                "city" => "Jakarta",
                "open" => "2021-08-08",
                "close" => "2022-02-01",
            ],
            [
                "company_id" => 2,
                "name" => "Sr iOS Engineer",
                "description" => "Your main duties in flying with us:\n\n - Research, design, develop, enhance, and maintain high-performance iOS applications\n - Collaborate with cross-functional teams to define, design, and ship new features\n - Identify and correct bottlenecks and fix bugs\n - Develop high performance, reusable, and reliable code\n - Create unit test and implement self-test to make sure the code is running well\n - Be passionate about code quality, testing, and performance\n - Drive best practices and stay current on upcoming iOS features\n\nMandatory belongings that you must prepare:\n\nBachelor degree or equivalent of Computer Science or related fields\n - 5+ years of software engineering experience\n - min. 3 years of experience working as a Senior iOS developer\n - Proficient in Objective-C and Swift\n - Experienced with iOS frameworks (Core Data, Core Animation, etc.)\n - Knowledge of application architecture (Viper, MVP, MVVM)\n - Good understanding of RESTful APIs and GraphQL\n - Good understanding of Apple’s design principles and interface guidelines\n - Knowledge of CI/CD, understanding TDD, and proficient in code versioning tools such as Git",
                "category" => "iOS Engineer",
                "pay_range" => 0,
                "country" => "Indonesia",
                "city" => "Jakarta",
                "open" => "2021-08-08",
                "close" => "2022-02-01",
            ],
            [
                "company_id" => 2,
                "name" => "Senior Product Manager",
                "description" => "Your main duties in flying with us:\n\n - Analyze development needs\n - Conduct extensive competitive product evaluations and analysis\n - Gather user/ customers feedback to deeply understand their needs\n - Prioritize product roadmap and own the product requirements flowing from customer needs\n - Write clear, concise product requirements and user stories\n - Lead agile product development process including backlog grooming, sprint planning, and prioritization sessions, and daily stand-ups\n - Manage various products independently\n - Evangelize ideas that solve real customer problems\n - Collaborate with technology, trade partnership, operation, and marketing to craft solutions to customer needs\n - Collaborate with other product teams to sync the release plan and deliver the best experience for our customers\n - Review user stories to ensure that the delivery is the same as initial requirements\n - Rapidly formulate concrete features that address needs and requirements expressed by internal users and customers\n - Document product functionality and communicate to users\n - Review scenario tests for the improvements, features, and projects to ensure that the delivery is the same as initial requirements\n - Create and track metrics to define the success of the initiative and inform future improvements\n - Set product strategy, plan short-term, and long-term product improvements to meet business goals, and measure success\n\n\nMandatory belongings that you must prepare:\n\n - Have a deep understanding of product management and product development\n - Have knowledge about OTA is a plus\n - Experience in agile scrum method\n - Have knowledge about technical/system development (backend & frontend) is a plus\n - Have knowledge about user design & experience element\n - Have knowledge about research methodology, such as customer research\n - Have knowledge about project management\n - Have good communication & collaboration skill\n - Have good interpersonal skill",
                "category" => "iOS Engineer",
                "pay_range" => 0,
                "country" => "Indonesia",
                "city" => "Jakarta",
                "open" => "2021-08-08",
                "close" => "2022-02-01",
            ],
        ];
    }
}
