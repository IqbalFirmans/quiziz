import { usePage } from "@inertiajs/inertia-react";
import Quiz from "../Components/Quiz/Quiz";

function Index(props) {
    const { questions, options, sum_questions } = usePage().props;
    console.log(questions);
    return (
        <div>
            {questions.data.map((question, index) => {
                return (
                    <Quiz
                        key={index}
                        id={question.id}
                        question={question.question}
                        questions={questions}
                        options={props.options}
                        quiz_id={props.quiz_id}
                    />
                );
            })}

        </div>
    );
}

export default Index;
