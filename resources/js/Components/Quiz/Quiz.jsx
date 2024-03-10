import React, { useState } from "react";
import "./Quiz.css";
import { InertiaLink } from "@inertiajs/inertia-react";

const Quiz = (props) => {
    console.log(props.options);
    const [active, setActive] = useState(null);
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
                                    <button onClick={() => setActive(index)} type="button" className="w-100 bg-white border border-none border-white">
                                        <div className={`m-1 p-2 border border-white rounded-3 ${active==index?"active text-white":"bg-secondary text-dark"}`}>
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

                {props.questions.next_page_url != null ? (
                    <InertiaLink
                        href={props.questions.next_page_url}
                        method="get"
                        as="button"
                        className="btn btn-primary mx-2 border border-white btn-sm rounded-5"
                    >
                        Save & Next &gt;
                    </InertiaLink>
                ) : (
                    <button
                        type="button"
                        className="btn btn-primary mx-2 border border-white btn-sm rounded-5"
                    >
                        <b>End Quiz</b>
                    </button>
                )}
            </div>
        </div>
    );
};

export default Quiz;
