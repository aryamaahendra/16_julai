import "./bootstrap";

import Alpine from "alpinejs";
import initListTable from "./tabel";
import Swal from "sweetalert2";
import "./mobil";

Alpine.data("initListDataLatih", () => ({
    init() {
        initListTable({
            id: this.$el.id,
            fields: ["no_polisi", "class"],
            wrapper: this.$el,
        });
    },
}));

Alpine.data("initListDataUji", () => ({
    init() {
        initListTable({
            id: this.$el.id,
            fields: ["no_polisi", "class"],
            wrapper: this.$el,
        });
    },
}));

Alpine.data("iniListMobil", () => ({
    init() {
        initListTable({
            id: this.$el.id,
            fields: [
                "nama_pemilik",
                "no_polisi",
                "jenis_kerusakan",
                "tgl_masuk",
            ],
            wrapper: this.$el,
        });
    },
}));

Alpine.data("initListHasilKNN", () => ({
    init() {
        initListTable({
            id: this.$el.id,
            fields: ["class", "euclidean"],
            wrapper: this.$el,
        });
    },
}));

Alpine.start();

document.addEventListener("DOMContentLoaded", () => {
    const alerts = document.querySelectorAll(".session-alert");
    alerts.forEach((alert) => {
        const err = alert.querySelector(`[name="error"]`).value;
        const message = alert.querySelector(`[name="message"]`).value;

        Swal.fire({
            icon: err ? "error" : "success",
            title: err ? "Oops!" : "Success",
            text: message,
        });
    });

    document.querySelectorAll(`form[delete-form]`).forEach((form) => {
        form.addEventListener("submit", (e) => {
            e.preventDefault();
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
