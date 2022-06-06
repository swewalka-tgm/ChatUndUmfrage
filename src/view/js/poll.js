/**
 * A function to thats shows the poll form
 */
 function pollForm() {
    document.getElementById("poll_container").style.display = "none"; // Hide the poll container containing the polls
    document.getElementById("pol_form").style.display = "block"; // Show the poll form
    document.getElementById("poll_create_btn").style.display = "none"; // Hide the create poll button(to prevent double click/conflict)
}

/**
 * A function to create a poll
 */
function createPoll() {

    let question = $("#poll_question").val();
    let options = $("#poll_options").val();
    let option_arr = options.split(",");
    if (hasDuplicates(option_arr)) {
        alert("Two or more options are the same which is not ideal for a poll!");
    } else {
        let poll_id = genPollId();

        if (question.length > 0 && options.length > 0) {
            $.ajax({
                url: "assets/php/poll_func.inc.php",
                type: "POST",
                data: {
                    "poll_id": poll_id,
                    "question": question,
                    "options": options,
                    "typeOfRequest": "addPoll"
                },
                success: function(data) {
                    alert(data);
                    window.location.reload();
                },
                error: function(data) {
                    alert(data);
                }
            });
        } else {
            alert("Please fill all the fields");
        }

        document.getElementById("poll_container").style.display = "block"; // Show the poll container containing the polls
        document.getElementById("pol_form").style.display = "none"; // Hide the poll form
        document.getElementById("poll_create_btn").style.display = "block"; // Show the create poll button
    }
}

/**
 * A function to generate a random poll id
 * @returns  {string} A random poll id
 */
function genPollId() {
    let poll_id = "";
    let possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    for (let i = 0; i < 8; i++) {
        poll_id += possible.charAt(Math.floor(Math.random() * possible.length));
    }
    return poll_id;
}

/**
 * A function to convert html entities to text -> prevents XSS
 * @param {string} str the string to convert
 * @returns the converted string
 */
function htmlEntities(str) {
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}

/**
 * A function to delete the poll
 * @param {string} poll_id  the poll id
 */
function delPoll(poll_id) {
    $.ajax({
        url: "assets/php/poll_func.inc.php",
        type: "POST",
        data: {
            "pollId": poll_id,
            "typeOfRequest": "deletePoll"
        },
        success: function(data) {
            alert(data)
            window.location.reload();
        },
        error: function(data) {
            alert(data)
        }
    })
}


/**
 * Function to share the poll by updating its share status
 * @param {*} pollId  the poll id
 */
function sharePoll(pollId) {
    $.ajax({
        url: "assets/php/poll_func.inc.php",
        type: "POST",
        data: {
            "pollId": pollId,
            "typeOfRequest": "sharePoll"
        },
        success: function(data) {
            alert(data)
            window.location.reload();
        },
        error: function(data) {
            alert(data)
        }
    })
}

/**
 * Function to vote for a poll
 * @param {*} pollId  the poll id
 */
function vote(pollId) {

    let voteValue = $("input[name=poll-" + pollId + "]:checked").val();
    if (voteValue == undefined) {
        alert("Please select an option");
    } else {
        $.ajax({
            url: "assets/php/poll_func.inc.php",
            type: "POST",
            data: {
                "pollId": pollId,
                "user_choice": voteValue,
                "typeOfRequest": "votePoll"
            },
            success: function(data) {
                alert(data)
                window.location.reload();
            },
            error: function(data) {
                alert(data)
            }
        });
    }


}

function hasDuplicates(array) {
    for (let i = 0; i < array.length; i++) {
        for (let j = i + 1; j < array.length; j++) {
            if (array[i] === array[j]) {
                return true;
            }
        }
    }
}