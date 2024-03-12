import React from "react";
import "./End.css";
const End = (props) => {
    return (
        <div className="kontainer mx-auto my-3">
            <div className="card">
                <div className="card-header bg-primary text-white">
                    <h5>End Quiz</h5>
                </div>
                <div className="card-body">
                    <p>
                        <span className="text-dark">
                            Total Soal : {props.count_question}
                        </span>
                        <br />
                        <span className="text-success">
                            Jumlah Benar : {props.true}
                        </span>
                        <br />
                        <span className="text-danger">
                            Jumlah Salah : {props.false}
                        </span>
                        <br /> <br />
                        <p className="text-center text-secondary">
                            Hasil : {props.result.toFixed(1)} <br /> <br />
                            <a href="/user/quiziz">
                                <button
                                    type="button"
                                    className="btn btn-primary bg-primary rounded-2 btn-sm border border-white">
                                    Pindah ke Halaman Quiz
                                </button>
                            </a>
                        </p>
                    </p>
                </div>
            </div>
        </div>
    );
};

export default End;
