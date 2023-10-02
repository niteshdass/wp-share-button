import inlinePage from "./Components/inlinePage.vue";
import stickyPage from "./Components/stickyPage.vue";

export default [
  {
    path: "/",
    name: "inline-share-button",
    component: inlinePage,
    meta: {
      active: "inline-share-button",
    },
  },
  {
    path: "/sticky-share-button",
    name: "stickyShareButton",
    component: stickyPage,
  },
];
