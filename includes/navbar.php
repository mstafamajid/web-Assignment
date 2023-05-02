nav {
  background-color: #ffff;
  position: fixed;
  top: 0;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: space-around;
  flex-direction: row;
  box-shadow: 1rem 1rem 3rem rgba(0, 0, 0, 0.09);
  padding: 0.5rem 0 0.5rem 0;
}
nav div ul {
  gap: 70px;
  display: flex;
  flex-direction: row;
}
nav div ul li a {
  text-decoration: none;
  font-weight: 600;
  color: #2e3467;
}
li {
  list-style: none;
}
#srch-ic {
  position: relative;
  margin-left: 400px;
  /* padding: 10px; */
  display: flex;
  flex-direction: row;
  gap: 10px;
  align-items: center;
  justify-content: center;
}
.srch {
  color: white;
  position: absolute;
  left: 10px;
  top: 5px;
  background: transparent !important;
}
.svg {
  width: 27.58px;
  height: 27.6px;
}
#search-field {
  border-radius: 45px;
  border: none;
  background: #2e3467;
  width: 260px;
  height: 38px;

  /* dark primary */

  background: #2e3467;
  border-radius: 24px;
}
#srch-ic div {
  height: 40px;
  width: 40px;
  border-radius: 50%;
  background-color: grey;
}

.mobNav {
  display: none;
}

.topBar {
  display: none;
}

/*responsive */
@media screen and (max-width: 500px) {
  .topBar {
    position: fixed;
    width: 100%;
    display: inline-flex;
    padding: 20px 0px 10px 0;
    background-color: #2e3467;
    box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.575);
    top: 0;
  }

  .logoM {
    margin-left: 20px;
  }

  .pfpM img {
    object-fit: cover;
    height: 50px;
    width: 50px;
    border-radius: 100%;
    margin-left: 220px;
  }

  nav {
    display: none;
  }

  .mobNav {
    box-shadow: 0px 0 10px 0 rgba(74, 74, 74, 0.623);

    border-top: 3px solid white;
    color: white;
    display: block;
    z-index: 1;
    position: fixed;
    bottom: 0;
    width: 100%;
    background-color: #2e3467;
  }

  .mobNav span {
    color: white;
  }

  .mobNav img {
    width: 26px;
  }

  .mobNav ul {
    display: flex;
    justify-content: center;
    align-items: center;

    list-style: none;
  }

  .a-nav__con {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
  }

  span {
    margin-top: 4px;
  }

  .mobNav ul li {
    transition: 0.2s;
    padding: 10px 25px 10px 25px;
  }

  .mobNav ul li:hover {
    cursor: pointer;
    background-color: #4a508e;
  }
}
