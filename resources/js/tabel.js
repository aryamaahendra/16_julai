import List from "list.js";

const initListTable = ({ id, fields, wrapper }) => {
   // const wrapper = this.$el;
   const next = wrapper.querySelector(".next");
   const prev = wrapper.querySelector(".prev");

   let perPage = 8;
   const list = new List(id, {
      valueNames: fields,
      page: perPage,
      pagination: [
         {
            name: "pagination",
            left: 1,
            right: 1,
            item: `<li class="btn overflow-hidden list-item px-0"><button class="btn page rounded-none"></button></li>`,
         },
      ],
   });

   // next.addEventListener("click", () => {
   //    const active = wrapper.querySelector(".pagination li.active .page");
   //    const page = active.dataset.i;

   //    const btnNextPage = wrapper.querySelector(
   //       `.pagination li [data-i="${parseInt(page) + 1}"]`
   //    );

   //    if (!btnNextPage) return;
   //    btnNextPage.click();
   // });

   // prev.addEventListener("click", () => {
   //    const active = wrapper.querySelector(".pagination li.active .page");
   //    const page = active.dataset.i;

   //    const btnPrevPage = wrapper.querySelector(
   //       `.pagination li [data-i="${parseInt(page) - 1}"]`
   //    );

   //    if (!btnPrevPage) return;
   //    btnPrevPage.click();
   // });

   // const updateList = () => {
   //    wrapper.querySelector(".first-item").textContent = list.i;
   //    wrapper.querySelector(".last-item").textContent =
   //       list.i + list.visibleItems.length - 1;
   //    wrapper.querySelector(".total-item").textContent =
   //       list.matchingItems.length;
   // };

   // list.on("updated", () => {
   //    updateList();
   // });

   // updateList();
};

export default initListTable;
