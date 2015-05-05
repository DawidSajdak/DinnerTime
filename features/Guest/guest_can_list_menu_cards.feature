Feature: Guest can list menu cards
  In order to choose and order dinner
  As a guest
  I need to be able to see the list of all menu cards

  Scenario: Getting two menu cards if there are two
    Given I am a guest
    And There are 2 menu cards
    When I list menu cards
    Then I should get a list of 2 menu cards

  Scenario: Not getting any menu card if there's none
    Given I am a guest
    But There are 0 menu cards
    When I list menu cards
    Then I should get an empty list of menu cards