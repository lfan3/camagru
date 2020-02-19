<style>
$colourNew: #1abc9c;
$colourRst: #e74c3c;
$colourRtn: #9b59b6;
$black: #000;
$white: #fff;

.wrap {
  background-color: $colourNew;
  height: 100vh;
  transition: background-color 400ms ease;
  &.--rtn {
    background-color: $colourRtn;
  }
  &.--new {
    background-color: $colourNew;
  }
  &.--rst {
    background-color: $colourRst;
  }
}

.flex-form {
  align-items: center;
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding-top: 4rem;
}

.select__list {
  display: inline-flex;
  justify-content: space-between;
  margin-bottom: 1rem;
  position: absolute;
  top: 10px;
}

.select__label {
  color: $white;
  cursor: pointer;
  font-weight: 500;
  opacity: 0.6;
  padding: 0 2rem;
  text-transform: capitalize;
  &--active {
    opacity: 1;
  }
}

.ui-button,
.ui-elem {
  border-radius: .7rem;
  height: 4rem;
  transition: all 300ms ease;
  width: 25rem;
}

.ui-elem-pass {
  &.--rst {
    height: 0;
    margin: 0;
  }
}

.ui-elem-rpass {
  &.--rtn,
  &.--rst {
    height: 0;
    margin: 0;
  }
}

input {
  background-color: $white;
  margin: .5rem 0;
  text-align: center;
}

textarea:focus,
input:focus {
  outline-color: $white;
}

.pointer {
  border-left: 1rem solid transparent;
  border-right: 1rem solid transparent;
  border-bottom: 1rem solid $white;
  height: 0;
  position: relative;
  top: .6rem;
  transition: all 30s ease;
  width: 0;
  &.--new {
    right: 9rem;
  }
  &.--rst {
    left: 9.5rem;
  }
}

.ui-button {
  background: rgba($white, 0.2);
  color: $white;
  cursor: pointer;
  font-weight: 500;
  margin: .5rem 0;
  text-transform: capitalize;
  transition: background 300ms;
  &:hover {
    background: rgba($black, 0.1);
  }
}
</style>