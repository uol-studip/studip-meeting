<?php

namespace ElanEv\Driver;

/**
 * Common interface for different conference server API driver implementations.
 *
 * @author Christian Flothmann <christian.flothmann@uos.de>
 */
interface DriverInterface
{
    /**
     * Creates a new meeting with the given parameters.
     *
     * @param MeetingParameters $parameters Options to configure the meeting
     *
     * @return bool True if the meeting has been created successfully, false
     *              otherwise
     */
    public function createMeeting(MeetingParameters $parameters);

    /**
     * Deletes a meeting.
     *
     * @param MeetingParameters $parameters Parameters describing the meeting
     *                                      to be removed
     *
     * @return bool True if the meeting was removed successfully, false
     *              otherwise
     */
    public function deleteMeeting(MeetingParameters $parameters);

    /**
     * Checks if a meeting with a certain id is already running.
     *
     * @param MeetingParameters $parameters The parameters describing the meeting
     *
     * @return bool True if the meeting is running, false otherwise
     */
    public function isMeetingRunning(MeetingParameters $parameters);

    /**
     * Returns the URL which can be browsed to join a meeting.
     *
     * @param JoinParameters $parameters Parameters that describe the meeting
     *                                   to join
     *
     * @return string The URL
     */
    public function getJoinMeetingUrl(JoinParameters $parameters);

    /**
     * Returns a list of config-options this plugins needs to have configured.
     * The options are stored json-encoed in a global config named
     * MEETINGS_SETTINGS
     *
     * @return ConfigOption[] list of ConfigOption-objects
     */
    public function getConfigOptions();
}
