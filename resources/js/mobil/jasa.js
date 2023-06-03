import Alpine from "alpinejs";
import axios from "axios";
import Swal from "sweetalert2";

Alpine.data("sendViaAxios", (page = "jasa") => ({
    init() {
        const form = document.getElementById(this.$el.id);
        form.addEventListener("submit", async (e) => {
            e.preventDefault();
            const data = new FormData(form);

            try {
                const res = await axios({
                    url: form.getAttribute("action"),
                    method: form.getAttribute("method"),
                    headers: {
                        Accept: "application/json",
                    },
                    data: data,
                    withCredentials: true,
                });

                Swal.fire({
                    icon: "success",
                    title: "Success!",
                    text: res.message,
                }).then((result) => {
                    if (result.isConfirmed) {
                        const url = new URL(window.location.href);
                        url.searchParams.set("page", page);
                        window.history.replaceState({}, "", url.toString());

                        location.reload();
                    }
                });
            } catch (err) {
                const res = err.response;
                if (res?.status == 422) {
                    Swal.fire({
                        icon: "error",
                        title: "Oops!",
                        text: res.data.message,
                    });
                    return;
                }

                Swal.fire({
                    icon: "error",
                    title: "Oops!",
                    text: "Something broken!",
                });
            }
        });
    },
}));
