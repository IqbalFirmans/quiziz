import React, { useState } from "react";
import "./Quiz.css";
import { InertiaLink } from "@inertiajs/inertia-react";
import { router } from "@inertiajs/react";

const Quiz = (props) => {
    console.log(props.error);
    const [active, setActive] = useState(null);
    const [values, setValues] = useState({
        index: "",
        quiz_id: "",
        question_id: "",
        option_id: "",
    });
    function handleValues(index, quiz_id, question_id, option_id) {
        setActive(index);
        setValues({
            index: index,
            quiz_id: quiz_id,
            question_id: question_id,
            option_id: option_id,
            url: window.location,
        });
    }
    const handleOption = (index, quiz_id, question_id, option_id) => {
        handleValues(index, quiz_id, question_id, option_id);
    };
    function handleSubmit(e) {
        e.preventDefault();
        router.post("/user/play/answer-quiz/" + props.quiz_id, values);
    }
    /** index % 4 akan mengembalikan nilai 0 pada index saat lebih dari 3 */
    return (
        <div className="card-size my-3">
            <div className="card">
                <div className="card-header bg-white text-dark text-center">
                    {props.question}
                </div>
                <div className="card-body text-dark bg-white">
                    {props.options.map((option, index) => {
                        return (
                            <div key={index}>
                                {props.id == option.question_id ? (
                                    <button
                                        onClick={(e) =>
                                            handleOption(
                                                index,
                                                props.quiz_id,
                                                props.id,
                                                option.id
                                            )
                                        }
                                        type="button"
                                        className="w-100 bg-white border border-none border-white"
                                    >
                                        <div
                                            className={`m-1 p-2 border border-white rounded-3 ${
                                                active == index
                                                    ? "active text-white"
                                                    : "bg-secondary text-dark"
                                            }`}
                                        >
                                            <input
                                                hidden
                                                type="radio"
                                                name="option"
                                                id=""
                                                value={String.fromCharCode(
                                                    65 + (index % 4)
                                                )}
                                                className="form-control"
                                            />
                                            {String.fromCharCode(
                                                65 + (index % 4)
                                            ) +
                                                "." +
                                                option.option}
                                        </div>
                                    </button>
                                ) : (
                                    ""
                                )}
                            </div>
                        );
                    })}
                </div>
            </div>
            <div className="d-flex justify-content-center mt-3">
                {/** tombol navigasi */}
                <form onSubmit={handleSubmit}>
                    <button
                        type="submit"
                        className="btn btn-secondary p-2 mx-2 border border-white btn-sm rounded-5"
                    >
                        Simpan
                    </button>
                </form>
                {props.questions.next_page_url != null ? (
                    <InertiaLink className="btn btn-primary mx-2 border border-white btn-sm rounded-5" as="button" href={props.questions.next_page_url}>
                        Lanjut &gt;
                    </InertiaLink>
                ) : (
                    <a
                       href={`/user/result-quiz/${props.quiz_id}`}
                        className="btn btn-primary p-2 mx-2 border border-white btn-sm rounded-5"
                    >
                        <b>End Quiz</b>
                    </a>
                )}
            </div>
        </div>
    );
};

export default Quiz;
