function addPost() {
    const postInput = document.getElementById("post-input");
    const postText = postInput.value;

    if (postText) {
        const main = document.querySelector("main");

        const post = document.createElement("div");
        post.className = "post";

        const user = document.createElement("div");
        user.className = "user";
        user.textContent = "New User"; // Replace with actual user data

        const content = document.createElement("div");
        content.className = "content";
        content.innerHTML = `<p>${postText}</p>`;

        post.appendChild(user);
        post.appendChild(content);

        main.appendChild(post);
        postInput.value = "";
    }
}
