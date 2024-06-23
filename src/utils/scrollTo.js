export default (id) => {
  const scrollToY = document.getElementById(id).offsetTop
  window.scrollTo({ top: scrollToY, behavior: 'smooth' })
}
